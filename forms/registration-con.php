<?php
    include '../connection.php';

   $uname = $_GET['uname'];
   $pword = password_hash($_GET['pword'], PASSWORD_DEFAULT);

  $sql = "SELECT * FROM user WHERE uname = '$uname'";
  $result = $conn->query($sql);
  
  if ($result->num_rows == 0) {
    // output data of each row
    $sql = "INSERT INTO user (uname, pword)
    VALUES ('$uname','$pword')";
    
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
          header("location: ../index.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    echo "Username Already Exists";
  }
