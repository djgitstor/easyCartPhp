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

		

	</style>
</head>
<!-- ---------------------This is the mark up----------------------- -->

<body>

	<?php require('partials/_header.php'); 
	$added = false;

// if(isset($_GET["more"])){
// 	$chack = "SELECT * FROM `shoping_cart` WHERE `item_id`=$_GET[itemid]";
// 	$chresult = mysqli_query($con, $chack);
//     $numrow = mysqli_num_rows($chresult);

// 	if ($numrow == 0){
// 	$sql = "INSERT INTO `shoping_cart`(`Sr.`, `item_id`, `userid`) VALUES ('','$_GET[itemid]','$_GET[more]')";

// 	$Result = mysqli_query($con, $sql);
// 	$added = true;
// }

// }
	
?>

	<!--This section is for The list of items-->
	<div class="content" style="height: -webkit-fill-available;">


		<?php
		$sql = "SELECT * FROM `items` WHERE `category_id`=$_GET[id]";
		$result = mysqli_query($con ,$sql);
		while($row = mysqli_fetch_array($result)){

if(isset($_GET["more"])){
	$chack = "SELECT * FROM `shoping_cart` WHERE `item_id`=$_GET[itemid]";
	$chresult = mysqli_query($con, $chack);
    $numrow = mysqli_num_rows($chresult);

	if ($numrow == 0){
	$sql = "INSERT INTO `shoping_cart`(`Sr.`, `item_id`, `userid`) VALUES ('','$_GET[itemid]','$_GET[more]')";

	$Result = mysqli_query($con, $sql);
	$added = true;
	$addeditem =$_GET['itemid'];
	$notifycart = true;
}}

			echo "<div id='il".$row['item_id']."' class='itembuylist'>
			<img src='admin/".$row["image"]."'>
			<Div class='itmdsc'>
				<h3>".$row["item_name"]."</h3>
				<p>".$row["description"]."</p>
				</Div>
				<div class='buy'>
					<h5>Rs.".$row["price_offer"]."</h5><del>Rs.".$row["item_price"]."</del>
					<br>";
					// echo "<button><a href='Orderpage.php?id=".$row["item_id"]."&more=".$_GET["id"]."'>Order Now</a></button>";
					if($added == true && $addeditem ==$row['item_id']){
					echo "<button style =  'background-color:#dddddd;'>Added</button>";
					
					}
		else{
			if(isset($_SESSION['userid'])){
			echo "<button style='
			background-color: #ffc6d3;
		'><a href='item_list.php?id=".$_GET['id']."&itemid=".$row["item_id"]."&more=".$_SESSION['userid']."#il".$row["item_id"]."'>Add To Cart</a></button>";
		}
		}
		echo "
		</div>
	</div>";

		}
		?>
	</div>

	<!------------------ This is the footer Section-------------------------------->
	<?php require('partials/_footer.php'); ?>
</body>

</html>