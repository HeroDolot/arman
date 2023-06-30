<?php
include './connection.php';
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
                    <div class="card-header fw-bolder fs-4 text-center p-4">Registration</div>
                    <div class="card-body">
                        <form action="./forms/registration-con.php" method="post">
                            <input type="text" name="uname" id="uname" placeholder="Enter Username" class="form-control mb-3">
                            <input type="password" name="pword" id="pword" placeholder="Enter Password" class="form-control mb-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Create an Account</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>