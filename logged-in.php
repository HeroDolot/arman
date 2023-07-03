<?php
session_start();
include './connection.php';
if (!isset($_SESSION["userid"])){
	header("location:./index.php");
}
$name = mysqli_query($conn,"SELECT * FROM user WHERE id = ".$_SESSION["userid"])->fetch_assoc()["uname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="p-3 text-center">
	<h1>Welcome, <?php echo $name;?></h1>
	<div class="row card justify-content-center">
		<div class="card-body col-md-6">
			<h3>Add Information</h3>
			<div class="input-group mb-3">
				<span class="input-group-text">Name</span>
				<input type="text" class="form-control" placeholder="First Name">
				<input type="text" class="form-control" placeholder="Middle Name">
				<input type="text" class="form-control" placeholder="Last Name">
			</div>
		</div>
	</div>
</body>
</html>