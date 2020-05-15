<?php session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$databaseName = "crud";
$tableName = "data";

if(isset($_POST['save']))
{

  $name = $_POST['name'];
  $location =$_POST['location'];

$conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO $tableName (userName, userLocation)
  VALUES ('$name', '$location')";
  $conn->exec($sql);

$_SESSION['message'] = "Records has been saved";
$_SESSION['msg_type'] = "success";

$conn = null;

header("location: index.php");

}

if(isset($_GET['delete']))
{
$conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $id=$_GET['delete']; 
$sql = "DELETE FROM $tableName WHERE id = ?";
$query = $conn->prepare($sql);
  $query->execute([$id]);

  $_SESSION['message'] = "Records has been deleted";
$_SESSION['msg_type'] = "danger";

$conn = null;

header("location: index.php");

}


?>