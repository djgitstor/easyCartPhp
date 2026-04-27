<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['adminid'])) {
        if (!empty($_POST['password'])) {

            // $con=mysqli_connect("localhost","root","",);
            // $db=mysqli_select_db($con,"easycart");
            require('partials/db_connect.php');

            $id = $_POST['adminid'];
            $pass = $_POST['password'];

            $sql = "SELECT * FROM admin WHERE admin_id ='$id' AND admin_pass='$pass'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $login = true;
                session_start();
                $_SESSION['adminin'] = true;
                $_SESSION['admin'] = $id;
                header('location:index.php');
                exit;
            } else {
                header("location:Signin.php");
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .raglink {
            background-color: rgb(21, 93, 201);
        }
    </style>
    <title>EasyCart-Admin-LogIn</title>
</head>

<body>
    <!-- Header of the file  -->
    <?php require('partials/_header.php'); ?>
    <!-- ------------------------------------- -->
    <div class="container text-center col-md-6">
        <h1>Sign In As Admin.</h1>
        <form class="mx-6 row g-3" action="" method="post">
            <div class="f1">
                <label for="adminid" class="form-label ">Admin ID</label>
                <input type="text" name="adminid" placeholder="Admin ID" class="form-control text-center" id="Inputadminid" aria-describedby="emailHelp">
            </div>
            <div class="f2">
                <label for="password" class="form-label ">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control text-center" id="Inputpassword" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn col-md-4 mx-auto btn-primary">Sign In</button>
        </form>
        <div class="ragistoration">
            <span>Click below for new Registoration...</span>
            <a href="ragistration.php"><button type="" class="btn mx-auto col-md-6 btn-success">Sign Up</button></a>
        </div>
    </div>
    <?php require('partials/_footer.php'); ?>
</body>

</html>