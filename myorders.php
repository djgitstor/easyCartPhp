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

	
?>

	<!--This section is for The list of Cart items-->
	<div class="content" style="height: -webkit-fill-available;">


		<?php
		if(isset($_GET['userid'])){
		$userid = $_GET['userid'];
		$sql = "SELECT * FROM `orders` WHERE `userid`='$userid'";
		$result = mysqli_query($con ,$sql);
		$totleprice = 0;
		while($row = mysqli_fetch_assoc($result)){
			$itemid = $row['item_id'];
			$sql = "SELECT * FROM `items` WHERE `item_id`='$itemid'";
			$iresult = mysqli_query($con ,$sql);
			$irow = mysqli_fetch_assoc($iresult);
			// echo var_dump($irow);
			// echo "<br>";

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
					

		echo "
		</div>
	</div>";




		}


	}
		?>
		<div class="cartprice">
<h1>Order Invoice.</h1>
<table>
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
		<td><h2>Rs.<?php echo $totleprice + $gst + $srv;?></h2></td>
	</tr>
</table>



	</div>
	</div>

	<!------------------ This is the footer Section-------------------------------->
	<?php require('partials/_footer.php'); ?>
</body>

</html>