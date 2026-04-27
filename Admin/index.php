<?php
require('partials/db_connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../CSS/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .main {
            display: flex;
            flex-direction: row;
            background-color: #d8ecf5;
        }

        .dashcards {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: center;
        }

        .dashcard {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: center;
            background-color: #f1f5f7;
            width: 300px;
            height: 180px;
            margin: 5px;
            text-align: center;
            border-radius: 5px;
            border: 2px solid #4fb1eb;
            border-left: 5px solid #4fb1eb;
        }
        .dashcard:hover{
            /* background-color: #4fb1eb; */
            background-color: rgb(87 145 231);
            border: 2px solid rgb(47, 108, 199);
            border-left: 5px solid rgb(47, 108, 199);
            /* border: 2px solid rgb(47, 108, 199);
            border-left: 5px solid rgb(47, 108, 199); */
        }
        .dashcard:hover a{
            color: #f1f5f7;

        }
        .dashcard a {
            padding: 1px;
            font-size: 20px;
            text-decoration: none;
            color: black;
        }

        #Dashmenu {
            background-color: rgb(21, 93, 201);
        }
    </style>

    <title>EasyCart-Admin</title>
</head>

<body>





    <!-- Header of the file  -->
    <?php require('partials/_header.php'); ?>
    <!-- ------------------------------------- -->
    <?php
    $showalart = false;
    if (!isset($_SESSION['admin'])) {
        header("location:Signin.php");
        exit;
    } else {
        $showalart = true;
    }
    ?>
    <div class="main">
        <?php require('partials/_sidebar.php'); ?>
        <div class=" additemdiv container text-center ">
            <h1>Dashboard</h1>
            <div class="dashcards">

                <div class="dashcard"><a href="manage_orders.php">

                        <?php
                        $sql = "SELECT * FROM `orders`";
                        $result = mysqli_query($con, $sql);
                        if ($row = mysqli_num_rows($result)) {
                            echo $row;
                        }
                        ?></a>
                    <a href="manage_orders.php">ORDERS</a>
                </div>
                <div class="dashcard">
                    <a href="manage_items.php">
                        <?php
                        $sql = "SELECT * FROM `items`";
                        $result = mysqli_query($con, $sql);
                        if ($row = mysqli_num_rows($result)) {
                            echo $row;
                        }
                        ?></a>
                    <a href="manage_items.php">ITEMS</a>

                </div>
                <div class="dashcard">
                    <a href="manage_users.php">
                        <?php
                        $sql = "SELECT * FROM `customers`";
                        $result = mysqli_query($con, $sql);
                        if ($row = mysqli_num_rows($result)) {
                            echo $row;
                        }
                        ?></a>
                    <a href="manage_users.php">USERS</a>
                    </a>

                </div>
                <div class="dashcard">
                    <a href="manage_categories.php">Categories</a>

                </div>
                <div class="dashcard">
                    <a href="adminsettings.php">Settings</a>

                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------------------------ -->



    <?php require('partials/_footer.php'); ?>

</body>

</html>