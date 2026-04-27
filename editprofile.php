<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Easy Cart- Best Home delivery service</title>

    <link rel="stylesheet" href="CSS/style.css" type="text/css">

    <link rel="icon" href="logo.png">

    <!-- This is the Bootstrap link -->
    <link rel="stylesheet" href="CSS/bootstrap.css" class="css">

    <!-- This link is for font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .imageupload{
                    /* height: 500px; */
                    padding:200px;
                    padding-top:100px;
                    text-align: center;
            }
        </style>
</head>

<body>

    <?php
    require("partials/_header.php");
    require("partials/db_connect.php");









    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM customers WHERE userid ='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $sr = $row['Sr'];
    $fname = $row['fname'];
    $sname = $row['sname'];
    $mob = $row['mob'];
    $email = $row['email'];
    echo '<div class="imageupload">';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['fname'])){
                $fname = $_POST['fname'];
                $sname = $_POST['sname'];
                $sql = "UPDATE `customers` SET `fname`='$fname',`sname`='$sname' WHERE userid = '$_SESSION[userid]'";
                $result = mysqli_query($con,$sql);
                header('location:user_profile.php');

            }
            if(isset($_POST['mobile'])){
                $mobile = $_POST['mobile'];
                $sql = "UPDATE `customers` SET `mob`='$mobile' WHERE userid = '$_SESSION[userid]'";
                $result = mysqli_query($con,$sql);
                header('location:user_profile.php');

            }
            if(isset($_POST['email'])){
                $email = $_POST['email'];
                $sql = "UPDATE `customers` SET `email`='$email' WHERE userid = '$_SESSION[userid]'";
                $result = mysqli_query($con,$sql);
                header('location:user_profile.php');

            }
            if(isset($_POST['country'])){

                // $addressid = $_GET['addressid'];
                $country = $_POST['country'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $hometown = $_POST['hometown'];
                $adsql = "SELECT * FROM addresses WHERE user_id ='$sr'";
                $adresult = mysqli_query($con, $asql);
                $adnum = mysqli_num_rows($adresult);
                if ($adnum == 1){

                $sql = "UPDATE `addresses` SET `country`='$country',`state`='$state',`city`='$city',`hometown`='$hometown' WHERE user_id=$sr";
                }
                else{
                    $sql = "INSERT INTO `addresses`(`id`, `user_id`, `country`, `state`, `city`, `hometown`, `mob`) VALUES ('','$sr','$country','$state','$city','$hometown','')";
                }
                $result = mysqli_query($con,$sql);
                header('location:user_profile.php');

            }

    }



    if(isset($_GET['editname'])){
echo '<form class="mx-6 row g-3" action="editprofile.php" method="post"enctype="multipart/form-data">
    
<label for="edit" class="form-label "><H3>Enter First Name. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="fname" class="form-control" id="exampleInputPassword1">
<label for="edit" class="form-label "><H3>Enter Last Name. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="sname" class="form-control" id="exampleInputPassword1">
<button type="submit" class="btn btn-primary ">Update</button>
</form>';
    }
    if(isset($_GET['editmobile'])){
echo '<form class="mx-6 row g-3" action="editprofile.php" method="post"enctype="multipart/form-data">
<label for="edit" class="form-label "><H3>Enter Mobile No. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="mobile" class="form-control" id="exampleInputPassword1">
<button type="submit" class="btn btn-primary ">Update</button>
</form>';
    }
    if(isset($_GET['editemail'])){
echo '<form class="mx-6 row g-3" action="editprofile.php" method="post"enctype="multipart/form-data">
<label for="edit" class="form-label "><H3>Enter E-mail. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="email" class="form-control" id="exampleInputPassword1">
<button type="submit" class="btn btn-primary ">Update</button>
</form>';
    }
    if(isset($_GET['editaddress'])){
echo '<form class="mx-6 row g-3" action="editprofile.php" method="post"enctype="multipart/form-data">
<label for="edit" class="form-label "><H3>Enter Country. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="country" class="form-control" id="exampleInputPassword1">
<label for="edit" class="form-label "><H3>Enter State. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="state" class="form-control" id="exampleInputPassword1">
<label for="edit" class="form-label "><H3>Enter City. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="city" class="form-control" id="exampleInputPassword1">
<label for="edit" class="form-label "><H3>Enter Hometown. <?php echo $_GET["edit"]?></H3></label>
<input type="text" name="hometown" class="form-control" id="exampleInputPassword1">
<button type="submit" class="btn btn-primary ">Update</button>
</form>';
    }

   ?>

<!-- <div class="imageupload"> -->
    <!-- <form class="mx-6 row g-3" action="editprofile.php" method="post"enctype="multipart/form-data">
    
        <label for="edit" class="form-label "><H2>Edit <?php echo $_GET['edit']?></H2></label>
        <input type="text" name="text" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn btn-primary ">Update</button>
    </form> -->

    </div>
    <?php
    require("partials/_footer.php");
    ?>
    

</body>

</html>