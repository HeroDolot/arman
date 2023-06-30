<?php
session_start();
if (!isset($_SESSION["userid"])){
    header("location:./index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="p-5">
    <h1>Hello World('print')</h1>
</body>
</html>