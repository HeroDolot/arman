<?php
include './connection.php';

session_start();

if (isset($_POST['submitLogin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pword']);
    $result = $conn->query("SELECT * FROM user WHERE uname='$username'");
    if ($result->num_rows == 1) {
        $result = $result->fetch_assoc();
        if (password_verify($password, $result["pword"])){
            $_SESSION["userid"] = $result["id"];
            header("location:./logged-in.php"); 
        } else {
            header("location:./?status=Incorrect User/pass");
        }
    } else {
        header("location:./?status=Username Not Exists");
    }
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

<body>
    <section>
        <div class="container justify-content-center align-items-center d-flex py-5 mt-5">
            <div class="wrapper col-md-5">
                <div class="card">
                    <div class="card-header fw-bolder fs-4 text-center p-4">Simple Registration and Login Form</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="text" name="uname" id="uname" placeholder="Enter Username" class="form-control mb-3">
                            <input type="password" name="pword" id="pword" placeholder="Enter Password" class="form-control mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" name="submitLogin" class="btn btn-primary">Login</button>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <a href="./registration.php">Don't have an Account?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>