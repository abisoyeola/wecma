<?php
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $db='wecmarest';

    $db_con = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$username,$password);

    //set some attributes
    $db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db_con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
    $db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    define('APP_NAME','WECMA PORTAL');

?>