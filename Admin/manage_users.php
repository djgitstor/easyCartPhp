<?php
$insert = false;
$update = false;
$delete = false;
// // Create a connection

require('partials/db_connect.php');

// Die if connection was not successful
if (!$con) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `customers` WHERE `Sr` = $id";
    $result = mysqli_query($con, $sql);
    header("location:manage_users.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .main {
            display: flex;
            flex-direction: row;
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
            <h1>Manage Users</h1>
            <table class="usertb">
                <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>actions</th>
                </tr>
                <?php
                
require('partials/db_connect.php');

                $sql = "SELECT * FROM `customers`";
                $result = mysqli_query($con, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
                   <th scope='row'>" . $sno . "</th>
                   <td>" . $row['fname'] . "</td>
                   <td>" . $row['email'] . "</td>
                   <td>" . $row['mob'] . "</td>
                   <td><button class='delete btn btn-sm btn-primary' id=d" . $row['Sr'] . ">Delete</button>  </td>
                 </tr>";
                }
                ?>

            </table>
        </div>
    </div>
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


    <!-- ------------------------------------------ -->

    <?php require('partials/_footer.php'); ?>
    <!-- ---------------------------------------------- -->

    <script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this user!")) {
                    console.log("yes");
                    window.location = `manage_users.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    console.log("no");
                }
            })
        })
    </script>

</body>

</html>