<!DOCTYPE html>

<head>
    <title>EasyCart - Best delivery</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="icon" href="logo.png">
    <link href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    

    <style>
        .form {
            display: flex;

            float: center;
            justify-content: space-between;
            text-align: center;
            margin: auto;
            background-color: beige;
            height: 400px;
            background-color: #ffffff;
            /* box-shadow: 1px 1px 20px 2px black; */
            padding: 50px;
            border: 2px groove rgba(255, 255, 255, 0.5);
            /* border-radius: 10px; */

            color: black;
            /* box-shadow: 0px 0px 10px 1px rgb(0, 0, 0); */
        }

        .ordernow a button {
            width: 300px;
            font-family: 'Heebo', sans-serif;
            font-size: 25px;
            padding: 8px;
            margin: 20px auto;
            border-radius: 5px;
            background-color: rgb(255, 49, 142);
            border-color: white;
            color: beige;
            cursor: pointer;
        }

        .ordernow a button:hover {
            color: rgb(28, 28, 68);
            background-color: rgb(255, 222, 237);
            border-color: rgb(41, 41, 41);


            cursor: pointer;
        }

        .content {
            display: block;
        }

        .fa-solid {
            margin: 20px;

        }
    </style>
</head>

<body>
    <?php require('partials/_header.php'); ?>
    <?php
    if (!isset($_SESSION['userid'])) {
        header("location:Signin.php");
        exit;
    } else {
    }
    ?>


    <?php
    $con = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($con, "easycart");

    $sql = "SELECT * FROM `customers` WHERE `userid`='$_SESSION[userid]'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $usersr = $row["Sr"];
    $userid = $row["userid"];
    $fname = $row["fname"];
    $sname = $row["sname"];
    $mob = $row["mob"];
    $email = $row["email"];

    $sql = "SELECT * FROM `items` WHERE `item_id`='$_GET[id]'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $item_id = $row["item_id"];
    $item_name = $row["item_name"];
    $price_offer = $row["price_offer"];
    $item_image = $row["image"];
    $desc = $row["description"];
    $item_name = $row["item_name"];

    $sql = "SELECT * FROM `addresses` WHERE `user_id`='$usersr'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $country = $row["country"];
    $state = $row["state"];
    $city = $row["city"];
    $hometown = $row["hometown"];
    $mob = $row["mob"];
    $sql = "SELECT * FROM `addresses` WHERE `user_id`='$usersr'";
    $addressid = $row["id"];

    ?>
    <!-- <div class="content"> -->
        <div class="form placeorder">
            <div class="img">
                <img src="admin/<?php echo $item_image;?>" width="500px" alt="itempic">
            </div>
            <div class="orderitemdiv"><?php echo $item_name;?>
        
        </div>
            <!------------------------------------------------------------------------->
            <h2 style="text-transform:capitalize;"><?php echo $fname . "  " . $sname; ?></h2>
            

            <div class="ordernow buy">
            <h1>Rs.<?php echo $price_offer;?></h1>
                <a href="orderplace.php?userid=<?php echo $userid; ?>&itemid=<?php echo $item_id; ?>&addressid=<?php echo $addressid; ?>"><button>Place Order</button></a>
            </div>
            <!------------------------------------------------------------------------->
        </div>

    <!-- </div> -->
    <div class="content" style="display:flex;">


        <?php
        if(isset($_GET["more"])){
        $sql = "SELECT * FROM `items` WHERE `category_id`=$_GET[more]";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='itembuylist'>
    <img src='admin/" . $row["image"] . "'>
    <Div class='itmdsc'>
        <h3>" . $row["item_name"] . "</h3>
        <p>" . $row["description"] . "</p>
        </Div>
        <div class='buy'>
            <h5>Rs." . $row["price_offer"] . "</h5><del>Rs." . $row["item_price"] . "</del>
            <br>
            <button><a href='Orderpage.php?id=" . $row["item_id"] . "&more=" . $_GET["id"] . "'>Order Now</a></button>
        </div>
    </div>";
        }}
        ?>

    </div>

    <?php require('partials/_footer.php'); ?>
</body>

</html>