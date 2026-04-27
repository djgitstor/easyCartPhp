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
</head>
<style>
    #name {
        margin-top:10px;
        text-transform: capitalize;
        text-align: center;
    }

    #Uimg {
        margin:50px;
        width: 300px;
        height: 300px;
        background-color: #ffffff;
        border: 2px solid #5a7661;
        border-radius: 150px;
        overflow: hidden;
        filter: drop-shadow(1px 2px 2px black);
    }

    .profileData {
        display: flex;
        flex-direction: column;
        align-items: center;

    }
    .usertb{
        border :2px solid #909090;
        text-align:center;
        width:60%;
    }
    .userdetail{
    display: flex;
    align-items: center;
    border-radius: 1px;
    border: 1px solid #a5a5a5;
    background-color: #dddddd;
    width: 90%;
    height: fit-content;
    overflow: hidden;
    justify-content: space-between;
    cursor: pointer;
    margin: 10px;
    padding: 20px;
    text-transform:capitalize;
    }
    .Logoutdiv a{
    text-decoration:none;
    color: #000000;
    display: flex;
    align-items: center;
    border :2px solid gray;
    padding:30px;
    margin:30px;
    padding-top:20px;
    padding-bottom:20px;
    
   
    }
    .Logoutdiv a:hover{
    background-color:#dddddd;
   
    }

</style>

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

    $asql = "SELECT * FROM addresses WHERE user_id ='$sr' order by id desc";
    $aresult = mysqli_query($con, $asql);
    if($arow = mysqli_fetch_array($aresult)){

        $addressid = $arow['id'];
        $country = $arow['country'];
        $state = $arow['state'];
        $city = $arow['city'];
        $hometown = $arow['hometown'];
    

    }
    else{
        
        $addressid = '';
        $country = '';
        $state = '';
        $city = '';
        $hometown = '';
    }

    ?>

    <div class="profileData">
        <h1 id="name">
            Welcome to <?php
   echo $fname.' '.$sname;
   ?>'s Profile.
            
        </h1>
        <div id="Uimg">



<?php
$sql = "SELECT * FROM user_images WHERE userid ='$_SESSION[userid]'";
$iresult = mysqli_query($con, $sql);
$num = mysqli_num_rows($iresult);
$image = mysqli_fetch_array($iresult);
if ($image){
    echo '<a href="uploadimage.php?userid='.$sr.'action=update"><img width="100%" src="'.$image['image'] .'" alt="user">';
}
else{
    echo '<a href="uploadimage.php?userid='.$sr.'action=add"> <img width="100%" src="images/user_images/default.png" alt="user">';
}
?>
</a>

           


        </div>
           
            <div class ="userdetail">
                <div> <h2>Name</h2> </div>
                <div> <h3><?php echo $fname .'  '. $sname ;?></h3> </div>
                <div> <h3 ><a style ="color:#358b47;" href="editprofile.php?editname=name;">Edit</a></h3> </div>
            </div>
            <div class ="userdetail">
                <div> <h2>Mobile Number</h2> </div>
                <div> <h3><?php echo $mob;?></h3> </div>
                <div> <h3 ><a style ="color:#358b47;" href="editprofile.php?editmobile=mobile">Edit</a></h3> </div>
            </div>
            <div class ="userdetail">
                <div> <h2>Email</h2> </div>
                <div> <h3><?php echo $email;?></h3> </div>
                <div> <h3 ><a style ="color:#358b47;" href="editprofile.php?editemail=email">Edit</a></h3> </div>
            </div>
            <div class ="userdetail">
                <div> <h2>Address</h2> </div>
                <div> <h3><?php echo $country.', '.$state.',<br> '.$city.',<br> '.$hometown ;?></h3> </div>
                <div> <h3 ><a style ="color:#358b47;" href="editprofile.php?editaddress=address&addressid=<?php echo $addressid;?>">Edit</a></h3> </div>
            </div>
            <div class ="Logoutdiv">
                <div><a href="partials/Logout.php"><h3>LogOut</h3></a></div>
                
            </div>

    </div>


    <?php
    require("partials/_footer.php");
    ?>
    

</body>

</html>