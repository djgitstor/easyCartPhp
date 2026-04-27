

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
                    height: 500px;
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
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userid = $_SESSION['userid'];

        if(isset($_FILES["image"])){
            if(empty($_FILES["image"])){
                $empty = "Please Select Image";
            }
            else{
                $filename = $_FILES['image']['name'];
                $filetmp_name = $_FILES['image']['tmp_name'];
                
                $dest = "images/user_images/".$filename;
                move_uploaded_file($filetmp_name, $dest);

                $ssql = "SELECT * FROM user_images WHERE userid ='$_SESSION[userid]'";
                $iresult = mysqli_query($con, $ssql);
                $num = mysqli_num_rows($iresult);
                $image = mysqli_fetch_array($iresult);
                if ($image){
                    
                    $isql = "UPDATE `user_images` SET `image`='$dest' WHERE userid = '$_SESSION[userid]'";
                }
                else{
                    $isql = "INSERT INTO `user_images`(`Sr`, `userid`, `image`) VALUES ('','$userid','$dest')";
                   
                }

                
                
                
                
                // $isql = "INSERT INTO `user_images`(`Sr`, `userid`, `image`) VALUES ('','$userid','$dest')";
                $result = mysqli_query($con, $isql);
                header("location:user_profile.php?alert=Uploaded");
            }
        }
    
    }
    







    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM customers WHERE userid ='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $sr = $row['Sr'];
    $fname = $row['fname'];
    $sname = $row['sname'];
    $mob = $row['mob'];
    $email = $row['email'];

   ?>

<div class="imageupload">
    <form class="mx-6 row g-3" action="uploadimage.php" method="post"enctype="multipart/form-data">
    
        <label for="image" class="form-label "><H2>Upload Profile Image</H2></label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <button type="submit" class="btn btn-primary ">Add Item</button>
    </form>

    </div>
    <?php
    require("partials/_footer.php");
    ?>
    

</body>

</html>