<?php
require('Partials/db_connect.php');
?>

<!DOCTYPE html>

<head>
	<title>EasyCart</title>
	<link rel="stylesheet" href="CSS/style.css" type="text/css">
	<link rel="stylesheet" href="CSS/bootstrap.css" type="text/css">
	<link rel="icon" href="logo.png">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Heebo:wght@600&display=swap');

		.cartprice{    
		display: flex;
		flex-direction: column;
		height: 300px;
		width: 100%;
		text-align: center;
		align-items: center;
		color: black;

		}
		.cartprice table{
			width:100%;
		}

	</style>
</head>
<!-- ---------------------This is the mark up----------------------- -->

<body>

	<?php require('partials/_header.php'); 
	$added = false;

if(isset($_GET["more"])){
	$chack = "SELECT * FROM `shoping_cart` WHERE `item_id`=$_GET[itemid]";
	$chresult = mysqli_query($con, $chack);
    $numrow = mysqli_num_rows($chresult);

	if ($numrow == 0){
	$sql = "INSERT INTO `shoping_cart`(`Sr.`, `item_id`, `userid`) VALUES ('','$_GET[itemid]','$_GET[more]')";

	$Result = mysqli_query($con, $sql);
	$added = true;
}

}
	
?>

	<!--This section is for The list of Cart items-->
	<div class="content" style="height: -webkit-fill-available;">


		<?php
		if(isset($_GET['userid'])){
		$userid = $_GET['userid'];
		$sql = "SELECT * FROM `shoping_cart` WHERE `userid`='$userid'";
		$result = mysqli_query($con ,$sql);
		$totleprice = 0;
		while($row = mysqli_fetch_assoc($result)){
			$itemid = $row['item_id'];
			$sql = "SELECT * FROM `items` WHERE `item_id`='$itemid'";
			$iresult = mysqli_query($con ,$sql);
			$irow = mysqli_fetch_assoc($iresult);

			echo "<div class='itembuylist'>
			<img src='admin/".$irow["image"]."'>
			<Div class='itmdsc'>
				<h3>".$irow["item_name"]."</h3>
				<p>".$irow["description"]."</p>
				</Div>
				<div class='buy'>
					<h5>Rs.".$irow["price_offer"]."</h5><del>Rs.".$irow["item_price"]."</del>
					<br>
					";
					$totleprice = $totleprice + $irow["price_offer"];
					if($added == true && $addeditem ==$irow['item_id']){
					// echo "<button style =  'background-color:gray;'>Added</button>";
					
					}
					echo "<a href='partials/removecartitem.php?userid=".$_SESSION['userid']."&remove=".$irow['item_id']."'><button style =  'background-color:#c3c3c3;'>Remove</button></a>";

					


		echo "
		</div>
	</div>";




		}
		

	}
		?>
		<div class="cartprice">
<h1>Cart Invoice.</h1>
<?php


$userid = $_SESSION['userid'];
$sql = "SELECT * FROM customers WHERE userid ='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$sr = $row['Sr'];

$asql = "SELECT * FROM addresses WHERE user_id ='$sr'";
    $aresult = mysqli_query($con, $asql);
    if($arow = mysqli_fetch_array($aresult)){
    $country = $arow['country'];
    $state = $arow['state'];
    $city = $arow['city'];
    $hometown = $arow['hometown'];
}else{
	
    $country = '';
    $state = '';
    $city = '';
    $hometown = '';
}

?>
<!-- <div class ="userdetail">
                <div> <h3>Address</h3> </div>
                <div> <p><?php echo $country.', '.$state.',<br> '.$city.',<br> '.$hometown ;?></p> </div>
</div> -->

<table>
	<tr>
		<th>Address.</th>
		<td style="text-transform:capitalize"><?php echo $country.', '.$state.','.$city.',<br> '.$hometown ;?></td>
	</tr>
	<tr>
		<th>Service Tax 1% </th>
		<td>Rs.<?php $srv = $totleprice/100*1; echo $srv;?></td>
	</tr>
	<tr>
		<th>GST 18% </th>
		<td>Rs.<?php $gst = $totleprice/100*18; echo $gst;?></td>
	</tr>
	<tr>
		<th>Totle with GST.</th>
		<td><h2>Rs.<?php $totle =$totleprice + $gst + $srv; echo $totle; ?></h2></td>
	</tr>
</table>

<div class="ordernow buy">
                <!-- <a href="partials/placeorder.php?userid=<?php echo $_SESSION['userid']; ?>"><button>Place Order</button></a> -->
                <a href="paymentgate.php?userid=<?php echo $_SESSION['userid'];?>&price=<?php echo $totle;?>"><button>Place Order</button></a>
            </div>

		</div>
	</div>

	<!------------------ This is the footer Section-------------------------------->
	<?php require('partials/_footer.php'); ?>
</body>

</html>