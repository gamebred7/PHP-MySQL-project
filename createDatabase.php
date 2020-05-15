<?php  
$servername = "localhost";
$username = "root";
$password = "root";
$databaseName = "crud";
$tableName = "data";

$conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
  $conn->exec($sql);
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  userName VARCHAR(100) NOT NULL,
  userLocation VARCHAR(100) NOT NULL)";
$conn->exec($sql);

$conn = null;

?>