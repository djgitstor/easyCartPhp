<?php
require('partials/db_connect.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_FILES["image"])){
        if(empty($_POST["name"])){
            $empty = "Please Enter Category Name";
        }
        else{
            $name = $_POST["name"];
            $Catagory = $_POST["Catagory"];
            $Price = $_POST["Price"];
            $Offer = $_POST["Offer"];
            $disc = $_POST["discription"];
            $filename = $_FILES['image']['name'];
            $filetmp_name = $_FILES['image']['tmp_name'];
            
            $dest = "../images/item_images/".$filename;
            move_uploaded_file($filetmp_name, $dest);
            // $sql = "INSERT INTO `items`(``, `$name`, ` $Catagory`, ` $Price`, `$Offer`, `$dest`, `$disc`)";
            $sql = "INSERT INTO `items`(`item_id`, `item_name`, `category_id`, `item_price`, `price_offer`, `image`, `description`) VALUES ('','$name','$Catagory','$Price','$Offer','$dest','$disc')";
            $result = mysqli_query($con, $sql);
            header("location:manage_items.php?alert=Added");
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
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .additem{
        background-color: rgb(21, 93, 201);
    }
    .main{
        display: flex;
        flex-direction: row;
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
<h1>Add items for Sell.</h1>
    <form class="mx-6 row g-3" action="Add_item.php" method="post"enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="name" class="form-label ">Product Name</label>
            <input type="text" name="name" placeholder="Product name write hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-6">
            <label for="Catagory" class="form-label  ">Catagory</label>
            <select type="text" name="Catagory" class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
                <option value="">Select...</option>
                <?php
                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($con ,$sql);
                ?>
                <?php 
                while($row = mysqli_fetch_array($result)){
                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                }
                ?>
               
            </select>
        </div>
        <div class="col-md-6">
            <label for="Price" class="form-label  ">Price</label>
            <input type="number" name="Price" placeholder="Rs." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-6">
            <label for="Offer" class="form-label ">Offer</label>
            <input type="number" name="Offer" placeholder="Rs." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-12">
        <label for="discription" class="form-label ">discription</label>
        <textarea type="text" name="discription" rows="7" placeholder="Write Discription Hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp"></textarea>
        </div>
        <label for="image" class="form-label ">Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn btn-primary ">Add Item</button>
    </form>
</div>
</div>

<?php require('partials/_footer.php'); ?>
</body>
</html>