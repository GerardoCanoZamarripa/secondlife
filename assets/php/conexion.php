<?php

$dsn = 'mysql:host=localhost;port=3306;dbname=secondlife';
$username = 'root';
$password = '';
$options = [];

$pdo = new PDO($dsn, $username, $password, $options);