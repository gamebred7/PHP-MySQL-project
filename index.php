<!DOCTYPE html>
<html>
<head>
<title>PHP website</title>
<meta charset = "UTF-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src = "https://code.jquery.com/jqery-2.1.3.min.js"></script>

</head>
<body>

<?php require_once 'process.php';  ?>
<?php require_once 'createDatabase.php';  ?>

<?php   
if(isset($_SESSION['message'])): ?>
<div class = "alert alert-<?=$_SESSION['msg_type']?>">
<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif; ?>

<div class="container">
<div class = "row justify-content-center">
<table class = "table">
<thaed>
<tr>
<th>Name</th>
<th>Location</th>
<th colspan = "2">Action</th>
</tr>
</thead>
<?php   
$servername = "localhost";
$username = "root";
$password = "root";
$databaseName = "crud";
$tableName = "data";

$conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $stmt = $conn->prepare("SELECT * FROM $tableName ORDER BY id DESC");
  $stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_OBJ)): ?>
<tr>
<td><?php echo $row->userName ?></td>
<td><?php echo$row->userLocation ?></td>
<td>
<a href="index.php?edit=<?php echo $row->id ?>" class = "btn btn-info">Edit</a>
<a href="index.php?delete=<?php echo $row->id ?>" class = "btn btn-danger">Delete</a>
</td>
</tr>
<?php endwhile; $conn = null; ?>


</table>
</div>

<div class = "row justify-content-center">
<form action = "process.php" method = "POST">
<div class = "form-group">
<label>Name</label>
<input type = "text" name ="name" placeholder = "Enter your name" class = "form-control">
</div>
<div class = "form-group">
<label>Location</label>
<input type = "text" name = "location" placeholder = "Enter your location" class="form-control">
</div>
<div class="form-group">
<button type = "submit" name = "save" class = "btn btn-primary">Save</button>
</div>
</form>
</div>

</div>

</body>
</html>