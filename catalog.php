<?php
require('products_db.php');
require('dbconnect.php');
$limit = 4;
$page = intval($_GET['page']) ?: 1;
$offset = ($page - 1) * $limit;
//Запрос для получения количества записей в таблице
$result = $conn->query("SELECT count(*) AS C FROM products");
$row = $result->fetch();
$products_quantity = $row['C'];
//Запрос для получения записей из таблицы
$result = $conn->query("SELECT * FROM products LIMIT ".$limit." OFFSET ".$offset);

$pages = $products_quantity / $limit;
$pages_total = ceil($pages);

$months = [1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля', 5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа', 9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'];

$day = date('j');
$month = date('n');
$year = date('Y');

$today = $day . $months[$month] . $year;

require('components/header.php');
require('components/products_list.php');

require('components/footer.php');