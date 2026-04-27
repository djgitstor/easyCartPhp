<?php
require('db_connect.php');
session_start();
if(isset($_GET["more"])){
	$chack = "SELECT * FROM `shoping_cart` WHERE `item_id`=$_GET[itemid]";
	$chresult = mysqli_query($con, $chack);
    $numrow = mysqli_num_rows($chresult);

	if ($numrow == 0){
	$sql = "INSERT INTO `shoping_cart`(`Sr.`, `item_id`, `userid`) VALUES ('','$_GET[itemid]','$_GET[more]')";

	$Result = mysqli_query($con, $sql);
	$added = true;
	$addeditem =$_GET['itemid'];
}}
header("location:../mycart.php?userid=".$_SESSION['userid']);
?>