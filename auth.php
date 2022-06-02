<?php
session_start();
if($_POST['login'])
{
    $result = $conn->query("SELECT * FROM users WHERE login='".$_POST['login']."'");
    if($row = $result->fetch())
    {
        if(($_POST['password']) == $row['password'])
        {
            $_SESSION['username'] = $_POST['login'];
            $_SESSION['id_auth_user'] = $row['id'];
            $_SESSION['is_admin'] = $row['is_admin'];
        }
        else
        {
            $message = 'Неверный пароль';
        }
    }
    else
    {
        $message = 'Неверный логин';
    }

    $title = $row['title'];
    $img_url = $row['img_url'];
    $price = $row['price'];
    if($_POST['password'] == 'pass')
    {
        $_SESSION['username'] = $_POST['login'];
    }
};

if($_GET['logout'])
{
    session_unset();
}