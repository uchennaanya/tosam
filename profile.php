<?php

session_start();

require_once('conn.php');

if (!ISSET($_SESSION['username'])) {
	
	header("location:login.php");
}
	$username = $_SESSION['username'];
	$select = $conn->query("SELECT* FROM ugctable WHERE username = '$username'");
	$row = mysqli_fetch_assoc($select); 

	$conn->close();
?>

<!doctype html>
<html lang="en">
	<head>
		
		<title> UGC || ProfilePage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="admn/assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/styl.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		
		
	</head>
	<body>
		
		<header class="sideheader">
			<a href="index.php">
				<img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo">
			</a>
			<nav class="sidenav">
				<a href="#"> dashbaord </a>
				<a href='edit.php' class="fa fa-window-flight"> <span > edith </span> <?php echo $row['username']; ?></a>
				<a href="#" > <i class="fa fa-money"> </i> fund wallet </a>
				<a href="#" > <i class="fa fa-money"> </i> transactions </a>
				<a href="contact.php"> <i class="fa fa-envelope"> </i> contact_us </a>
				<a href="logout.php" class="fa fa-sign-out"> logout </a>
			</nav>
		</header>

		<main>
		
		<div class="container-fluid" >
			<div class="row">
			
				<div class="col-md-4">
				
					<div class="howitworks">
					<div class="howitworks2">
						HOW IT WORKS 
					</div>
				<div class="how">
					<h3> 
						Create a new UGC account 
						<span class="howitspan">
						Step 1 
						</span>
					</h3> 
					<h3>
						<p> Create a new UGC wallet 
							<span class="howitspan" style="color: black;"> Step 2 </span>
						</p>
					</h3>
					<h3>
						Fund your UGC account using the UGC concept <br> account uising the following 
					</h3>
				</div>
					<div class="bank">
						<p> Bank Acc Detail </p> 
						<p> Bank: Firstbank PLC ltd </p>
						<p> Acc Name: CEOU Data consult. </p>
						<p> Act No. 2031433484 </p>
					</div>
				</div>
				
		</div>
		<div class="col-md-4">
				
			<div style="padding: 5%;">
				
				<div class="balance" >
					<div>
						<span> Wallet Ballance: </span>
						<p > &#8358; <?php echo $row['balance'].':00'; ?> </p>
					</div>								
				</div>
			</div>		
		</div>	
	</div>	
</div>
	
		</main>
		<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		}

		/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
			document.body.style.backgroundColor = "white";
		}
			
		</script>
	</body>
</html>