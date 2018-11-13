<?php

?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || LoginPage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
	</head>
	<body>
				
		<div class="mail">Contact@yahoo.com</div>
		
		<header>
			<a href="profile.php"> <img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"> </a>
			<nav>
<!--				<a href="index.php">home</a><a href="profile.php">back</a>-->
			</nav>
		</header>
		<div class="container">
			<div class="login">
				<div >
					<h3> Write to us : </h3>
					
					<form method="post">
						Email:<br />
						<input type="text" accesskey="0" name="username"> <br /><br />
						Subject:<br />
						<input type="password" name="password"> <br /><br />
						Message:<br />
						<textarea placeholder="Your message" name="msg"></textarea> <br />
						<input  type="submit" name="loginbtn" value="Send" >
					</form>
				</div>
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
				beside MOUAU filling station<br>
				Umudike, Ikwuano. Abia state.
			</div>
		</footer>
		
	</body>
</html>