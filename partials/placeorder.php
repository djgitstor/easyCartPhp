<?php
require('db_connect.php');
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];

    $sql = "SELECT * FROM `shoping_cart` WHERE `userid`='$userid'";
    $result = mysqli_query($con ,$sql);

    $totleprice = 0;
    while($row = mysqli_fetch_assoc($result)){
        $itemid = $row['item_id'];
        $itemsql = "SELECT * FROM `items` WHERE `item_id`='$itemid'";
        $iresult = mysqli_query($con ,$itemsql);
        $irow = mysqli_fetch_assoc($iresult);






        






        $insql = "INSERT INTO `orders`(`order_id`, `item_id`, `userid`, `address_id`) VALUES ('','$row[item_id]','$_GET[userid]','1')";
        $inresult = mysqli_query($con ,$insql);
        $rmsql = "DELETE FROM `shoping_cart` WHERE `userid`='$_GET[userid]' && `item_id`=$row[item_id]";
        $rmresult = mysqli_query($con ,$rmsql);

    }
    header("location:../index.php?order=Placed+Seccesfully");

}
?>