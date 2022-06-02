<?php
// подключение к БД
try {
    $conn = new PDO("mysql:host=localhost;dbname=60591taa", 'root', 'root');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
    die();
}