<?php
session_start();
// if(isset($_GET["more"])){
// 	$chack = "SELECT * FROM `shoping_cart` WHERE `userid`=$_SESSION[userid]";
// 	$chresult = mysqli_query($con, $chack);
//     $numrow = mysqli_num_rows($chresult);

// 	if ($numrow != 0){
// 	$Result = mysqli_query($con, $sql);
// 	$added = true;
// 	$addeditem =$_GET['itemid'];
// 	$notifycart = true;
// }}

require('partials/db_connect.php');
if (isset($_SESSION['userid'])) {
$sql = "SELECT * FROM user_images WHERE userid ='$_SESSION[userid]'";
$iresult = mysqli_query($con, $sql);
$num = mysqli_num_rows($iresult);
$image = mysqli_fetch_array($iresult);
if ($image){
    $pic = $image['image'];
    // echo '<a href="uploadimage.php?userid='.$sr.'action=update"><img width="100%" src="'.$image['image'] .'" alt="user">';
}
else{
    $pic = 'images/user_images/default.png';
    // echo '<a href="uploadimage.php?userid='.$sr.'action=add"> <img width="100%" src="images/user_images/default.png" alt="user">';
}
}

?>
<style>
    #userpic{
    width:50px;
    padding : 2px ;

    height: 60px;
    padding: 0px;
    border-radius: 50%;
    border: 1px solid var(--themecolor);
    overflow: hidden;
    width: 60px;
    margin: 0px;
    filter: drop-shadow(1px 2px 2px black);
    }
</style>

<nav id="nav" class="navigation">
    <a class="logoHome" href="index.php"><img src="logo.png" width="60px" alt="EasyCart"></a>
    <h1>Easy Cart</h1>
    <ul>
        <li><a href="index.php">Home</a>
        </li>

        <form action="" class="SearchBar">
            <input type="Text" name="Search" id="Search" placeholder="Search">
            <button type="submit"><img src="img/Search.png" alt="Search"></Img></button>
        </form>
        <?php
        if (isset($_SESSION['userid'])) {
            echo '<li id="mycartnev"><a href="MyCart.php?userid='.$_SESSION['userid'].'">My Cart</a></li>';
            echo '<li><a href="myorders.php?userid='.$_SESSION['userid'].'">My Oeders</a></li>';
            // echo '<li><a href="index.php">My Wishlist</a></li>';
        }
        ?> 
        <li style="text-transform:capitalize; padding :1px;" class="userpic">
        <div id="userpic">
        <!-- <a href="user_profile.php"><img width = "100%" src="<?php echo $pic;?>" alt=""></a> -->
        
            <?php
        if (isset($_SESSION['userid'])) {
            echo '<a href="user_profile.php"><img width = "100%" src="'.$pic.'" alt=""></a>';
        //     echo '<a href="user_profile.php">'.$_SESSION['userid'].'</a>';
        } else {
            echo '<a href="SignIn.php"><img width = "100%" src="images/user_images/default.png" alt=""></a>';
        }
        ?> 
        </div>
    </li>
        </ul>
    <script>
        let contact = document.getElementById('con');
        let conlist = document.getElementById('conlist');
        conlist.style.display = "none";
        con.addEventListener('click', function() {
            console.clear();
            if (conlist.style.display === 'none') {
                conlist.style.display = 'block';
            } else {
                conlist.style.display = 'none';
            }
        })
    </script>


</nav>