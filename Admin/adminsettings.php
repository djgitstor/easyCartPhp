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
    <form class="mx-6 row g-3" action="" method="post">
        <div class="col-md-6">
            <label for="exampleInputname" class="form-label ">Product Name</label>
            <input type="text" name="name" placeholder="Product name write hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-6">
            <label for="exampleInputname" class="form-label  ">Catagory</label>
            <select type="text" name="name" class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
                <option value="null">Select...</option>
                <option value="Pizza">Pizza</option>
                <option value="Burger">Burger</option>
                <option value="Samosa">Samosa</option>
                <option value="Noodle">Noodle</option>
                <option value="Shakes">Shakes</option>
                <option value="Home_Style">Home_Stylee</option>
                <option value="Sandwich">Sandwich</option>
                <option value="Paratha">Paratha</option>
                <option value="Dosa">Dosa</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="exampleInputname" class="form-label  ">Price</label>
            <input type="number" name="name" placeholder="Rs." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-6">
            <label for="exampleInputname" class="form-label ">Offer</label>
            <input type="number" name="name" placeholder="Rs." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp">
        </div>
        <div class="col-md-12">
        <label for="exampleInputname" class="form-label ">discription</label>
        <textarea type="text" name="disc" rows="7" placeholder="Write Discription Hare..." class="form-control text-center" id="exampleInputname" aria-describedby="emailHelp"></textarea>
        </div>
        <!-- <div id="emailHelp" class="form-text text-start">We'll never share your email with anyone else.</div> -->
        <!-- </div>
                <div class="mb-5 mx-5 text-center"> -->
        <label for="exampleInputPassword1" class="form-label ">Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn btn-primary ">Add Item</button>
    </form>
</div>
</div>

<?php require('partials/_footer.php'); ?>
</body>
</html>