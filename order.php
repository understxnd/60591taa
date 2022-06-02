<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

if($_SESSION['username'])
{
    //получение текущего заказа
    $result = $conn->query("SELECT * FROM orders WHERE status=0 and id_user=".$_SESSION['id_auth_user']);


    //если заказа не найдено
    if(!$row = $result->fetch())
    {
        if($_POST['id'])
        {
            //создание нового заказа
            $result = $conn->query("INSERT INTO orders (id_user,status,created_at)
                                VALUES ('".$_SESSION['id_auth_user']."','0','".date('Y-m-d H:i:s', time())."')");
            $id_order = $conn->lastInsertId();
        }
    }
    else
    {
        $id_order = $row['id'];
    }

    //добавление товара к заказу, если был запрос на добавление
    if($_POST['id'])
    {
        $result = $conn->query("INSERT INTO order_product(id_product,id_order,quantity,price,color)
                    VALUES ('" . $_POST['id'] . "','" . $id_order . "'," . $_POST['quantity'] . ",'" . $_POST['price'] . "','" . $_POST['color'] . "')");
    }

    if($_POST['delid'])
    {
        $result = $conn->query("DELETE FROM order_product WHERE id = ".$_POST['delid']);
        $result = $conn->query("SELECT count(*) AS total FROM order_product OP WHERE OP.id_order=".$id_order);
        if($result->fetch()['total'] == 0)
        {
            $result = $conn->query("DELETE FROM orders WHERE id = ".$id_order);
            $id_order = 0;
        }
    }

    //получение текущего заказа
    if($id_order)
    {
        $result = $conn->query("SELECT * FROM products P,order_product OP WHERE P.id = OP.id_product and OP.id_order=".$id_order);
        $result_sum = $conn->query("SELECT sum(OP.price * OP.quantity) AS total FROM products P,order_product OP WHERE P.id = OP.id_product and OP.id_order=".$id_order);
    }

    require('components/order.php');
}
else
{
    $message = 'Для Оформления заказа войдите в систему';
    header("Location:login.php");
    die();
}

require('components/message.php');
require('components/footer.php');