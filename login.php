<?php

session_start();

require_once ('conn.php');

//if (ISSET($_SESSION['username']) != "") {
//	
//	header("location:profile.php");
//	exit;	
//}

$mail = $error ="";
$passworderror = "";

if (isset($_POST['loginbtn'])) {
	
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	if (!empty($username) && !empty($password)) {
		
	$log = $conn->query("SELECT * FROM ugctable WHERE username = '$username'");
		$row = $log->fetch_array();
		$count = $log->num_rows;
	
	if (password_verify($password, $row['password']) && $count == 1) {
		
		$_SESSION['username'] = $row['username'];
		header("location:profile.php");
} else {
		
		$passworderror = "<p class='msg'>" . "please verify your password!" . "</p>";
	}
} else {
		$error = "<p class='msg'>" . "All field required!" . "</p>";
	}
	
	$conn->close();
}

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
		
			<h3 class="mail">Contact@yahoo.com</h3>
		
		<header>
			<nav>
				<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"></a>
			</nav>
		</header>
		<div class="container">
		<div class="login">
			<div style="padding: 50px 10px 40px 10px; background-color: #fda100;">
				<?php echo $error; ?>
			<form method="post">
				USERNAME:<br />
				<input type="text" accesskey="0" name="username"> <br /><br />
				PASSWORD:<br />
				<input type="password" name="password"> <br /><br />
				<?php echo $passworderror; ?>
				<input  type="submit" name="loginbtn" value="LOGIN" > New here ? <a href="signup.php">Register.</a>
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
				beside MOUAU ffilling station<br>
				Umudike, Ikwuano. Abia state.
			</div>
		</footer>
		
	</body>
</html>