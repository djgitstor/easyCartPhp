<!DOCTYPE html>
<html lang="en">
<head>
  
<link rel="stylesheet" href="CSS/style.css" type="text/css">
<title>Payment</title>
<link rel="icon" href="logo.png">

<!-- This is the Bootstrap link -->
<link rel="stylesheet" href="CSS/bootstrap.css" class="css">

<!-- This link is for font awsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .paymentgate{

        }
        * {
margin: 0;
padding: 0;
}

body {
font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
font-weight: bold;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius:50px;

    padding:50px;
    height: fit-content;
    width: fit-content;
    background-image: linear-gradient(var(--themecolor), var(--themecolor2));
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    position: absolute;
    filter: drop-shadow(1px 2px 2px black);
}

.main-content {
    
height: 235px;
background-color: #1b9236;
border-bottom-left-radius: 90px;
border-bottom-right-radius: 80px;
border-top: #1e6b30;
}

.text {
text-align: center;
font-size: 300%;
text-decoration: aliceblue;
color: aliceblue;
}

.course {
color: black;
font-size: 25px;
font-weight: bolder;
}

.centre-content {
height: 180px;
margin: -70px 30px 20px;
color: aliceblue;
text-align: center;
font-size: 20px;
border-radius: 25px;
padding-top: 0.5px;
background-image: linear-gradient(#1e6b30, #308d46);
}

.centre-content-h1 {
padding-top: 30px;
padding-bottom: 30px;
font-weight: normal;
}

.price {
font-size: 60px;
margin-left: 5px;
bottom: 15px;
position: relative;
}

.pay-now-btn {
cursor: pointer;
color: #fff;
height: 50px;
width: 290px;
border: none;
margin: 5px 30px;
background-color: rgb(71, 177, 61);
position: relative;
border-radius:10px;
filter: drop-shadow(1px 2px 2px black);
}

.card-details {
    
display: flex;
flex-direction: column;
align-items: center;
/* background: rgb(8, 49, 14); */
color: rgb(225, 223, 233);
margin: 10px 30px;
padding: 10px;
border-radius: 25px;
/* border-bottom-left-radius: 80px; */
}

.card-details p {
font-size: 15px;
}

.card-details label {
font-size: 15px;
line-height: 35px;
}

.submit-now-btn {
cursor: pointer;
color: #fff;
height: 30px;
width: 200px;
border: none;
border-radius: 10px;
margin: 5px 30px;
background-color: rgb(71, 177, 61);
filter: drop-shadow(1px 2px 2px black);
}
.price{
    color:#ffffff;
}
thead, tbody, tfoot, tr, td, th{
    padding:5px;
}



    </style>
</head>
<body>
<?php require('partials/_header.php'); ?>










<body>
	<div class="container">
        <div class="price">
<div><h3><?php echo "Rs.".$_GET['price'];?></h3></div>

        </div>

	<div class="last-content">
		
		<button type="button" class="pay-now-btn">
		Pay with Netbanking
		</button>

		<!-- <button type="button" class="pay-now-btn">
		Netbanking options
		</button> -->
	</div>

	<div class="card-details">
		<p>Pay using Credit or Debit card</p>



        <table>
            <tr><th><label> Card Number </label></th><td><input name="CardNumber"
			type="text"
			class="card-number-field"
			placeholder="###-###-###"/></td></tr>

            <tr><th><label> Expiry Date </label></th><td><input type="text" class="date-number-field"
				placeholder="DD-MM-YY" /></td></tr>

            <tr><th><label> CVV number </label></th><td><input type="text" class="cvv-number-field"
				placeholder="xxx" /></td></tr>

            <tr><th><label> Card Holder name </label></th><td><input
			type="text"
			class="card-name-field"
			placeholder="Enter your Name"/></td></tr>
        </table>


		<a href = "partials/placeorder.php?userid=<?php echo $_SESSION['userid'];?>&payment=<?php echo "succesfull";?>"><button type="submit"
				class="submit-now-btn">
		submit
		</button></a>


	</div>
	</div>




















<div class="pamentgate">
    <div id="paymentform">















    </div>
</div>
    
</body>
</html>