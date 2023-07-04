<?php
session_start();
include './connection.php';
if (!isset($_SESSION["userid"])){
	header("location:./index.php");
}

if (isset($_POST["submitProfile"])){
	$fn = mysqli_real_escape_string($conn,$_POST["fn"]);
	$mn = mysqli_real_escape_string($conn,$_POST["mn"]);
	$ln = mysqli_real_escape_string($conn,$_POST["ln"]);
	$suffix = mysqli_real_escape_string($conn,$_POST["suffix"]);
	$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
	$result = mysqli_query($conn,"INSERT INTO profiles (fn,mn,ln,suffix,gender) VALUES ('$fn','$mn','$ln','$suffix','$gender')");
	header("location:./logged-in.php?status=Profile has been added to database");
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
<body class="p-3 row justify-content-center overflow-hidden">
	<h1 class="text-center fw-lighter">Welcome, <?php echo $name;?></h1>
	<div class="row card col-md-10">
		<div class="card-body">
			<h3 class="fw-lighter">Add Profile Informaton</h3>
			<form method="POST">
				<div class="input-group mb-3">
					<span class="input-group-text">Name</span>
					<input type="text" class="form-control" required name="fn" placeholder="First Name">
					<input type="text" class="form-control" required name="mn"placeholder="Middle Name">
					<input type="text" class="form-control" required name="ln"placeholder="Last Name">
					<select name="suffix" class="form-control">
						<option value="" selected disabled>Suffix</option>
						<option value="jr.">Jr.</option>
						<option value="sr.">Sr.</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
					</select>
					<select name="gender" required class="form-control">
						<option value="" selected disabled>Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<button type="submit" name="submitProfile" class="btn btn-outline-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
	<?php if (isset($_GET["status"])){echo "<h1 class='text-center text-success mt-3 fw-lighter'>".mysqli_real_escape_string($conn,$_GET["status"])."</h1>";}?> <h1></h1>
	<div class="card col-md-10 mt-3">
		<div class="card-body">
			<table class="table table-borderless table-dark">
				<thead>
					<th></th>
					<th>First</th>
					<th>Middle</th>
					<th>Last</th>
					<th>Suffix</th>
					<th>Gender</th>
				</thead>
				<tbody>
					<?php
						$result = mysqli_query($conn,"SELECT * FROM profiles");
						while ($row = $result->fetch_assoc()){
							$a1 = "";
							if ($row["gender"] == "Male"){
								$prefix = "Mr.";
							} else {
								$prefix = "Ms.";
							}
							echo '	<tr>
										<td>'.$prefix.'</td>
										<td>'.$row["fn"].'</td>
										<td>'.$row["mn"].'</td>
										<td>'.$row["ln"].'</td>
										<td>'.$row["suffix"].'</td>
										<td>'.$row["gender"].'</td>	
									</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>