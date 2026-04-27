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

            $dest = "../images/Catagory_images/" . $filename;
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
    $sql = "DELETE FROM `category` WHERE `id` = $id";
    $result = mysqli_query($con, $sql);
    header("location:manage_categories.php");
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

        #catemenu {
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
            <h1>Categories.</h1>
            <table class="usertb">
                <tr>
                    <th>Sr.</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                require('partials/db_connect.php');

                $show = "SELECT * FROM `category`";
                $result = mysqli_query($con, $show);
                $sno = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $sno += 1;
                    echo "<tr>
                   <th scope='row'>" . $sno . "</th>
                   <td><img src='" . $row['image'] . "'width = '100px' alt=''></td>
                   <td>" . $row['name'] . "</td>
                   <td>" . $row['description'] . "</td>
                   <td><button class='delete btn btn-sm btn-primary' id=d" . $row['id'] . ">Delete</button>  </td>
                 </tr>";
                }
                ?>

            </table>
            <h1>Add Category.</h1>
            <form class="mx-6 row g-3" action="manage_categories.php" style="justify-content:center;" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="exampleInputname" class="form-label ">Category Name</label>
                    <input type="text" name="name" placeholder="Product name write hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
                    <span><?php if (isset($empty)) {
                                echo $empty;
                            } ?></span>
                </div>

                <div class="col-md-6">
                    <label for="exampleInputname" class="form-label ">discription</label>
                    <textarea type="text" name="disc" rows="1" placeholder="Write Discription Hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp"></textarea>
                </div>
                <!-- <div id="emailHelp" class="form-text text-start">We'll never share your email with anyone else.</div> -->
                <!-- </div>
                <div class="mb-5 mx-5 text-center"> -->
                <!-- <label for="image" class="form-label ">Image</label>
                <input type="file" name="image" class="form-control" id="inputimage"> -->
                <div class=" text-center">
                    <label for="image" class="form-label ">Image</label>
                    <input type="file" name="image" class="form-control" id="Inputimage">
                </div>
                <button type="submit" style="
            margin: 32px;
            width: 50%;
            " class="btn btn-primary ">Add Category</button>
            </form>
        </div>
    </div>

    <?php require('partials/_footer.php'); ?>
</body>


<script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this user!")) {
                console.log("yes");
                window.location = `manage_categories.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
</script>


</html>