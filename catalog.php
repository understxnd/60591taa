<?php
require('products_db.php');

$products = get_products();
$limit = 6;
$page = intval($_GET['page']) ?: 1;
$offset = ($page - 1) * $limit;
$products_on_page = array_slice($products, $offset, $limit, true);
$products_quantity = count($products);
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
