<?php

use LDAP\Result;

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "easycart");
$sql = "INSERT INTO `orders`(`order_id`, `item_id`, `userid`, `address_id`) VALUES ('','$_GET[itemid]','$_GET[userid]','$_GET[addressid]')";
$Result = mysqli_query($con, $sql);
header("location:index.php?order=Placed+Seccesfully");
?>