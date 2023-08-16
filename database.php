<?php

$server = 'localhost:3310';
$username = 'root';
$password = '';
$database = 'php_login_database';
// se crea la conexion a la base de datos
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
