<?php
    include '../connection.php';

   $uname = $_POST['uname'];
   $pword = $_POST['pword'];

//    var_dump($_POST);

   $sql = "INSERT INTO user (uname,pword) VALUES ($uname,$pword)";

   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // header('location:../index.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>

