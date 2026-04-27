<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['adminid'])) {
        if (!empty($_POST['password'])) {

            $host = "localhost";
            $user = "root";
            $dbpass = "";
            $db = "easycart";
            $con = mysqli_connect($host, $user, $dbpass, $db);
            $emailalrt = false;
            $passalrt = false;
            $idalrt = false;
            $showalart = false;

            $shop = $_POST['shop'];
            $name = $_POST['adminname'];
            $adminid = $_POST['adminid'];
            $mob = $_POST['phone'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['cpassword'];
            if ($pass == $cpass) {
                $sql = "INSERT INTO `admin`(`shop_name`, `admin_name`, `admin_id`, `admin_mob`, `admin_email`, `admin_pass`) 
                VALUES ('$shop','$name','$adminid','$mob','$email','$pass')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $showalart = true;
                }
            } else {
                $showerror = "Password Do Not Match";
            }
        } else {
            $passalart = "please enter Password";
        }
    } else {
        $idalart = "Please enter admin id";

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
        <style>
        .raglink {
            background-color: rgb(21, 93, 201);
        }
    </style>
    <title>EasyCart-Admin-Ragistration</title>
</head>

<body>
    <!-- Header of the file  -->
    <?php require('partials/_header.php'); ?>
    <!-- ------------------------------------- -->
    <div class="container text-center col-md-6">
        <h1>Registoration Hare For Work.</h1>
        <form class="mx-6 row g-3" action="ragistration.php" method="POST">
            <div class="">
                <label for="shop" class="form-label ">Shop Name</label>
                <input type="text" name="shop" placeholder="Shop Name" class="form-control text-center" id="inputshopname" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="adminname" class="form-label ">Admin Name</label>
                <input type="text" name="adminname" placeholder="Shop Owner Name" class="form-control text-center" id="inputadminname" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="adminid" class="form-label ">Admin ID</label>
                <input type="text" name="adminid" placeholder="Admin ID" class="form-control text-center" id="Inputadminid" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="phone" class="form-label ">Mobile No.</label>
                <input type="number" name="phone" placeholder="Product name write hare" class="form-control text-center" id="Inputphone" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="email" class="form-label ">Email</label>
                <input type="email" name="email" placeholder="Example@gmail.com" class="form-control text-center" id="Inputemail" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="password" class="form-label ">Password</label>
                <input type="text" name="password" placeholder="Password" class="form-control text-center" id="Inputpassword" aria-describedby="emailHelp">
            </div>
            <div class="">
                <label for="cpassword" class="form-label ">confirm Password</label>
                <input type="text" name="cpassword" placeholder="confirm Password" class="form-control text-center" id="cpassword" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>