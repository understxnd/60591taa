<?php
require('products_db.php');
require('components/header.php');

$id = $_GET['product_id'];

$title = get_product_title($id);
$img_url = get_img_url($id);
if ($is_violet_tuesday) {
  require('components/product_violet.php');
}

require('components/product_info.php');
require('components/footer.php');



