<?php
require('partials/db_connect.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    if (isset($_FILES['image'])) {
        if (empty($_POST['name'])) {
            $empty = "Please Enter Category Name";
        } else {
            $name = $_POST['name'];
            $disc = $_POST['disc'];
            $filename = $_FILES['image']['name'];
            $filetype = $_FILES['image']['type'];
            $filetmp_name = $_FILES['image']['tmp_name'];
            $fileerror = $_FILES['image']['error'];
            $filesize = $_FILES['image']['size'];

            $dest = "../Catagory_images/" . $filename;
            move_uploaded_file($filetmp_name, $dest);

            $sql = "INSERT INTO `category`(`id`, `name`, `description`, `image`) VALUES ('','$name','$disc','$dest')";
            $result = mysqli_query($con, $sql);
            header("location:manage_categories.php");
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `items` WHERE `item_id` = $id";
    $result = mysqli_query($con, $sql);
    header("location:manage_items.php");
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
        .additem {
            background-color: rgb(21, 93, 201);
        }

        .main {
            display: flex;
            flex-direction: row;
        }

        #itemmenu {
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
    <?php if (isset($_GET["alert"])=="Added") {
            echo '<div class="" style = "
        position:absolute;
        right: 10px;
        left: 260px;
        height: 50px;
        "><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Item! </strong>' . " $_GET[alert]" .
                ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div></div>';
        }?>
        <?php require('partials/_sidebar.php'); ?>
        <!-- ------------------------------------- -->

        <div class=" additemdiv container text-center col-md-6">
       
            <h1>My Items.</h1>
            <table class="usertb">
                <tr>
                    <th>Sr.</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Offer Price</th>
                    <th>Action</th>
                </tr>
                <?php
                // $con = mysqli_connect("localhost", "root", "",);
                // $db = mysqli_select_db($con, "easycart");
                require('partials/db_connect.php');

                $show = "SELECT * FROM `items`";
                $result = mysqli_query($con, $show);
                $sno = 0;
                $count = 10;
                $countst = 0;
                if(isset($_GET['itemcount'])){
                    if ($_GET['itemcount']!=NULL){
                    $count = $_GET['itemcount'];
                    $countst = $count-10;}
                }
                while (($row = mysqli_fetch_array($result))&&($sno<$count)){
                    $sno += 1;
                    if($sno>$countst){
                    echo "<tr>
                   <th scope='row'>" . $sno . "</th>
                   <td><img src='" . $row['image'] . "'width = '100px' alt=''></td>
                   <td>" . $row['item_name'] . "</td>
                   <td>" . $row['description'] . "</td>
                   <td>" . $row['item_price'] . "</td>
                   <td>" . $row['price_offer'] . "</td>
                   <td><button class='delete btn btn-sm btn-primary' id=d" . $row['item_id'] . ">Delete</button></td>
                 </tr>";
                 }
                }
                ?>
               
                
            </table>
            
            <a href="manage_items.php?itemcount=<?php if($count>11){ echo $count-10;}?>">Previous</a>

            <a href="Add_item.php" style="
            margin: 32px;
            width: 50%;
            " class="btn btn-primary">Add Item</a>
            <?php $rows = mysqli_num_rows($result);?>
            <a href="manage_items.php?itemcount=<?php 
            if($count<$rows){ echo $count+10;
            }else{
                echo $count;
            }
            // echo $count+10;?>">more</a>
        </div>
    </div>

    <?php require('partials/_footer.php'); ?>
</body>

<script src="../js/bootstrap.bundle.min.js"></script>
<script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this user!")) {
                console.log("yes");
                window.location = `manage_items.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
</script>


</html>