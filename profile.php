<?php

session_start();

include'conn.php';

if ( !isset($_SESSION['username']) ) {
	
	header("location:index.php");
}

	$id = $_SESSION['username'];
	$select = $conn->query("SELECT* FROM ugctable WHERE username = '$id'");
	$row = mysqli_fetch_assoc($select); 

	$conn->close();
?>
<!doctype html>
<html lang="en">
	<head>
		
		<title> UGC || HomePage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		
	</head>
	<body>
			<h3 class="mail">Contact@yahoo.com</h3>
		<input type="hidden" name="username">
		<header>
			<nav>
				
				<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"></a>
				
				<a href="edit.php?id=<?php echo $id; ?>"> <?php echo $row['username']; ?> </a><a href="#">BUY</a><a href="logout.php">LOGOUT</a>
				
			</nav>
		</header>
		<div class="container">
			<div class="content" style="padding: 100px 5%;">
			<div class="avatar">
				
			</div>
				<div class="profile" > PROFILE </div>
			</div>		
		</div>
		<footer>
			<div class="social">
			<p> JOIN US </p>
			<i class="fa fa-facebook"></i>
			<i class="fa fa-twitter"></i>
			<i class="fa fa-instagram"></i>
			</div>
			<div class="address">
				<p>ADDRESS</p>
				Opposite School gate<br>
				beside MOUAU ffilling station<br>
				Umudike, Ikwuano. Abia state.
			</div>		</footer>
	</body>
</html>