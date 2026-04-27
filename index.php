<?php

use LDAP\Result;
require('partials/db_connect.php');
?>
<!DOCTYPE html>

<head>



    <title>Easy Cart- Best Home delivery service</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">

    <link rel="icon" href="logo.png">

    <!-- This is the Bootstrap link -->
    <link rel="stylesheet" href="CSS/bootstrap.css" class="css">

    <!-- This link is for font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ================================================================================================= -->


    <style>
        .itemlist {
            font-family: 'Heebo', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #a5a5a5;
            /* border-radius: 10px; */
            background-color: #dddddd;
            color: rgb(255, 255, 255);
            text-shadow: 2px 2px 2px #938b8b;
            width: 468px;
            height: 368px;
            cursor: pointer;
            margin: 10px;
        }
        .itemlist:hover{
            background-color: #ced9e1;
        }
        a {
            text-decoration: none;
            text-align: center;
            color: rgb(255, 255, 255);

        }
        .itemlist a {
            text-decoration: none;
            text-align: center;
            color: #000000;

        }

        .itemlist img:hover .itemlist {
            width: 478px;
            height: 378px;
            margin: 5px;
        }

        .itemlist img {
            height: 200px;
        }

        .itemlist img:hover {
            /* height: 210px */
            scale: 1.05;
            
        }

        .itemlist h3 {
            font-size: 40px;
        }

        /* ==================================   Done   ========================================= */
    </style>
</head>

<body>

    <!-------------------------------- HTML For navigation Bar ----------------------------------->


    <?php require('partials/_header.php'); ?>
    <?php
    $showalart = false;
    $ordersucceed = false;
   
    if (!isset($_SESSION['userid'])) {
        // header("location:Signin.php");
        // exit;
    } else {
        $signin = true;
        if (isset($_GET['welcome'])) {
            $showalart = true;
        }
    }
    if (isset($_GET['order'])) {
        $ordersucceed = true;
    }

    ?>

    <!--------------------- This section is for main content   ------------------------>
    <div  class="alrt content d-block text-center" style="">
        <?php
        if ($showalart == true) {
            echo '<div style = "
        position:absolute;
        right: 10px;
        left: 10px;
        "><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Welcome! </strong>' . " Welcome $_SESSION[userid]" .
                ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div></div>';
        }
        if ($ordersucceed == true) {
            echo '<div style = "
        position:absolute;
        right: 10px;
        left: 10px;
        "><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Order! </strong>' . " $_GET[order]" .
                ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div></div>';
        }
        ?>
    </div>


        <div class="workplaceimg">
            <img id="workplaceimg" src="images/workplace.jpg" alt="image" srcset="">
        </div>
        <!-- <hr id="h1shadow"> -->
        <hr class="hr1">
        <div class="catagorybolls">
            <div class="bolls">
                <a href="item_list.php?id=37" class="boll"><img src="images/mobilepng2.png" alt="mobile" srcset=""></a>
                <a href="item_list.php?id=38" class="boll"><img src="images/androidmobile2.png" alt="mobile" srcset=""></a>
                <a href="item_list.php?id=28" class="boll"><img src="images/boll3.png" alt="mobile" srcset=""></a>
                <a href="item_list.php?id=26" class="boll"><img src="images/boll4.png" alt="mobile" srcset=""></a>
                <a href="item_list.php?id=30" class="boll"><img src="images/boll5.png" alt="mobile" srcset=""></a>
            </div>
            <div class="lastboll"></div>
        </div>
        <hr class="hr1">
        <div class="catagorycards">

            <div class="catcard" id="catcard1"><a href="item_list.php?id=27">
                    <div class="catcardimg" id="catcardimg1"><img src="images/catcard1.png" alt="" srcset=""></div>
                    <div class="cardname" id="catcardtext1">Mobiles</div>
                </a>
            </div>

            <div class="catcard" id="catcard2"><a href="item_list.php?id=26">
                    <div class="catcardimg" id="catcardimg2"><img src="images/catcard2.png" alt="" srcset=""></div>
                    <div class="cardname" id="catcardtext2">Computers</div>
                </a>
            </div>

            <div class="catcard" id="catcard3"><a href="item_list.php?id=30">
                    <div class="catcardimg" id="catcardimg3"><img src="images/catcard3.png" alt="" srcset=""></div>
                    <div class="cardname" id="catcardtext3">Others</div>
                </a>
            </div>

        </div>
        <hr id="h1shadow">

    <div class="content">
        <?php
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($con, $sql);
        ?>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo " <div class='itemlist'>
                    <a href='item_list.php?id=" . $row["id"] . "'><img src='Admin/" . $row["image"] . "' alt='image'>
                        <h3>" . $row["name"] . "</h3>
                    </a>
                </div>";
        }
        ?>

       
    </div>
    <hr id="h1shadow">

    <div class="content" style="display:flex;">

        <?php
        
        $sql = "SELECT * FROM `items` ORDER BY item_id DESC";
        $result = mysqli_query($con, $sql);
$x = 0;
        while (($row = mysqli_fetch_array($result)) && ($x<5)) {

            if (!isset($_SESSION['userid'])) {
                $location = "Signin.php";
            } else {
                $location = "Orderpage.php?id=".$row["item_id"]."&more=".$row["category_id"];
            }
            echo "<div class='itembuylist'>
    <img src='admin/" . $row["image"] . "'>
    <Div class='itmdsc'>
        <h3>" . $row["item_name"] . "</h3>
        <p>" . $row["description"] . "</p>
        </Div>
        <div class='buy'>
            <h5>Rs." . $row["price_offer"] . "</h5><del>Rs." . $row["item_price"] . "</del>
            <br>";
            // echo "<button><a href='$location"."'>Order Now</a></button>";
            
            if(isset($_SESSION['userid'])){
                echo "<button style='
                background-color: #ffc6d3;
            '><a href='partials/addcartitem.php?itemid=".$row["item_id"]."&more=".$_SESSION['userid']."'>Add To Cart</a></button>";
            }
    
        echo "</div>
    </div>";
    $x = $x+1;
        }
        ?>

    </div>
    <!-- -----------------------------   Footer Part   --------------------------------------- -->
    <?php require('partials/_footer.php'); ?>

    <!-- ---------------------------------This script is from bootstrap------------------------------- -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--===============================================================================================================-->
</body>

</html>