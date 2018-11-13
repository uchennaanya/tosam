<?php 

session_start();
if (ISSET($_SESSION['username']) && $_SESSION['username'] != "") {
	
	header("location:welcome.php");
}

require_once'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$status = 'Sold';
	$msql = $conn->query("select * from addpin where status = 'active'");
	$row = mysqli_fetch_assoc($msql);
	
	$sql = $conn->query("UPDATE addpin SET status = $status");	
}

?>

<!doctype html>
<html lang="en">
	<head>
		
		<title> UGC || HomePage </title>
			
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styl.css">
		<link rel="stylesheet" href="css/font-awesome.css" >
		<link rel="stylesheet" href="css/imagehover.css" >
		<link rel="stylesheet" href="css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		
	</head>
	
	<body>
		<div class="mail"> Contact@yahoo.com </div>
		
		<div class="container-fluid">
			<div class="col-md-1" ></div>
		  <div class="row" style="background-color: #fda100; margin-bottom: 2%;">
			  <div class="col-md-12" >
				<nav class="navbar navbar-inverse " style="width: 100%; background-color: #fda100; color: black; border-radius: 0px; border: none; padding-left: 100px;">
					<div class="navbar-header">
						<a href="#">
							<img src="img/UGC%20Concept%20Logo.jpg" class="logo navbar-brand">
						</a>
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-left">
						<li>

						</li>
					  </ul>
						
					  <ul class="nav navbar-nav" style="color: black !important; float: right; font-size: 20px; padding-top: 2px;" >
<!--
						<li class=""><a href="#howitworks">How it works</a></li>
						<li><a href="login.php">login</a></li>
-->
						<li><a href="signup.php">register</a></li>
					  </ul>
					</div>
				  </nav>
			  </div>
			</div>
		</div>	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
				<div class="col-md-1"></div>
					<div class="col-md-10" id="main-slider">
						<div class="slider-wrapper">
						<img src="img/images.png" alt="First" class="slide" />
						<img src="img/images1.png" alt="Second" class="slide" />
						<img src="img/vllkyt3106v68l03t.70cc7b8b.jpg" alt="Third" class="slide" />
					</div>
				</div>	
			
			</div>
		</div>
		</div>
		<div class="container-fluid">
			<div class="row">
			
				<div class="col-md-1"></div>
				<div class="col-md-8">
				
					<h2> OUR SERVICES </h2>
				<ol style="color: #000; margin-bottom:50px;">
					<li >
						We sell scratch cards in wholesale and retail ! 
					</li>
				</ol>
				
				</div>
			</div>
			
			<div class="container-fluid">
			
				<div class="row">
				<div class="col-md-1"></div>
					<div class="col-md-3 portfolio">
				<figure class="imghvr-fade" >
					<img src="img/card2.jpg" class="sell">
					<figcaption>
						 Product: Scratch card <br><br>
						 Price: N 1000.00<br /><br >
						<a href="checkout.php">
							<input type="button"value="Buy Now" class="imghvrbtn">
						</a>
					</figcaption>
				</figure>
					</div>
					<div class="col-md-3 portfolio">
				<figure class="imghvr-fade" >
					<img src="img/card1.jpg" class="sell">
					<figcaption>
						 Product: Scratch card <br /><br />
						 Price: N 1000.00<br /><br />
						<a href="checkout.php">
							<input type="button"value="Buy Now" class="imghvrbtn">
						</a>
					</figcaption>
				</figure>
					</div>
					<div class="col-md-3 portfolio">
				<figure class="imghvr-fade" >
					<img src="img/card4.jpg" class="sell">
					<figcaption>
						 Product: Scratch card <br><br>
						 Price: N 1000.00<br /><br />
						<a href="checkout.php"><input type="button"value="Buy Now" class="imghvrbtn"></a>
					</figcaption>
				</figure>
					</div>
<!--
					<div class="col-md-3 portfolio">
						<figure class="imghvr-fade" >
							<img src="img/Neco.png" class="sell">
							<figcaption>
								 Product: Scratch card <br><br>
								 Price: N 1000.00<br /><br />
								<a href="checkout.php"><input type="button"value="Buy Now" class="imghvrbtn"></a>
							</figcaption>
						</figure>
					</div>
-->
				</div>
			</div>
		</div>
			
		<div class="container-fluid" id="howitworks">
			<div class="row">
				
				<div class="col-md-1"></div>
				
				<div class="col-md-10">
				<h2> HOW IT WORKS </h2>
				
				<ol class="list-group" style="color: #000;">
					<li class="list-group-item">
						Create a with UGC concept account.
					</li>
					<li class="list-group-item">
						On completion and submitng the UGC concept registration form.
					</li>
					<li class="list-group-item">
						A confirmation link will be sent to you in the email address you provided on filling the form.
					</li>
					<li class="list-group-item">
						Click confirm then proceed to login where you will be directed to your dashboard for purchases.
					</li>
				</ol>
				<h2> How to purchase the scratch cards on UGC Concept web plat form </h2>
				<ol class="list-group" style="color: #000;">
					<li class="list-group-item">
						Fund your E-wallet by making a deposit into our bank accounts or login to your account and fund your wallet with your ATM card (MasterCard, Visa, Verve) or directly from your bank account (* Access Bank,Diamond Bank FCMB,GTB (via internet banking),Fidelity Bank, Wema Bank,Zenith Bank)
					</li>
					<li class="list-group-item">
						Send an sms containing the amount you deposited, the bank account details you deposited in, your email( the one registered with Ugc Concept) in this format: "email:youremail@domain.com, amount: N10000, bank: FCMB Bank, account number:3781379018, account name: Logic and Webs.
					</li>
					<li class="list-group-item">
						Your UGC Concept E-wallet would be credited instantly if you are using online payment. We would have to confirm payement before crediting your E-wallet if payment was made through bank deposit
					</li>
					<li class="list-group-item">
						You can then login to your UGC Concept account and select the card/pin you want to purchase.
					</li>
				</ol>
				
					</div>
				
				</div>
				
				</div>
			
				<div style="text-align: center;">
				<h1 style="text-align: center; color: #fda100;"> BANK ACCOUNT DETAIL </h1>
				<img src="img/index.png" width="100px" height="75px">
					
					<p style=" opacity: .70;">Bank: Firstbank PLC ltd </p>
					<p style=" opacity: .70;">Acc Name: CEOU Data consult.</p>
					<p style=" opacity: .70;">Act No. 2031433484 </p>
					
				</div>
		
		<footer>
			<div class="social">
			<p> JOIN US </p>
			<i class="fas fa-facebook"></i>
			<i class="fas fa-twitter"></i>
			<i class="fa fa-instagram"></i>
			</div>
			<div class="address">
				<p>ADDRESS</p>
				Opposite School gate<br>
				beside MOUAU ffilling station<br>
				Umudike, Ikwuano. Abia state.
			</div>
		</footer>
		<script src="js/js.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>