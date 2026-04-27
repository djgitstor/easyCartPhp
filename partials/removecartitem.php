<?php
require('db_connect.php');
if(isset($_GET['remove'])){
			$rsql = "DELETE FROM `shoping_cart` WHERE `userid`='$_GET[userid]' && `item_id`=$_GET[remove]";
			$rresult = mysqli_query($con , $rsql);
			header('location:../mycart.php?'.'userid='.$_GET['userid']);
    		exit;
		}
?>