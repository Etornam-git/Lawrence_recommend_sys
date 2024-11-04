<?php

    $host = "localhost";
    $db = "recommendersystem";
    $user_name = 'root';
    $password = "";
    $charset = 'utf8mb4';
    $port = 3307;

    $dsn = "mysql:host=$host;dbname=$db;port=$port";

    $conn = new PDO($dsn,$user_name, $password);
        
?>