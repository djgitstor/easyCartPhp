<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .additem {
            background-color: rgb(21, 93, 201);
        }

        .main {
            display: flex;
            flex-direction: row;
        }

        #ordermenu {
            background-color: rgb(21, 93, 201);
        }

        .usertb {
            width: 100%;
            border: 1px solid black;

        }

        .usertb th {
            height: 50px;
            width: 200px;
            border: 1px solid gray;

        }

        .usertb td {
            height: 50px;
            width: 200px;
            border: 1px solid gray;

        }
    </style>
    <title>EasyCart-Admin</title>
</head>

<body>
    <!-- Header of the file  -->
    <?php require('partials/_header.php'); ?>
    <div class="main">
        <?php require('partials/_sidebar.php'); ?>
        <!-- ------------------------------------- -->

        <div class=" additemdiv container text-center col-md-6">
            <h1>Manage Orders.</h1>
            <table class="usertb">
                <tr>
                    <th>Sr.</th>
                    <th>Order ID</th>
                    <th>UserID</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                require('partials/db_connect.php');

                $show = "SELECT * FROM `orders`";
                $result = mysqli_query($con, $show);
                $sno = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $sno += 1;
                    $sql = "SELECT * FROM `customers` WHERE `userid`='$row[userid]'";
                    $urest = mysqli_query($con, $sql);
                    $res = mysqli_fetch_array($urest);
                    
                    echo "<tr>
                   <th scope='row'>" . $sno . "</th>
                   <td>" . $row['order_id'] . "</td>
                   <td>" . $row['userid'] . "</td>
                   <td>" . $row['order_time'] . "</td>
                   <td>" . $row['status'] . "</td>
                   <td><button class='delete btn btn-sm btn-primary' id=d" . $row['order_id'] . ">Delete</button>  </td>
                 </tr>";
                }
                ?>

            </table>
        </div>
    </div>

    <?php require('partials/_footer.php'); ?>
</body>

</html>