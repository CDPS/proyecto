<?php


$host = "localhost";
$db_name = "ejemplophp1";
$username = "root";
$password = "";
  
try {
    $conexion = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// to handle connection error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
