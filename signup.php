<?php

require_once('conn.php');

$username = $mail = $phone = $password = "";
$pass_er = $errusername = $errmail = $errphone = $errpassword = $errrepass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$username = htmlspecialchars($_POST['username']);
	$mail = htmlspecialchars($_POST['mail']);
	$phone = htmlspecialchars($_POST['phone']);
	$password = htmlspecialchars($_POST['password']);
	$repass = $_POST['repass'];
	
	if (empty($username) || !preg_match("/^[a-zA-Z]*$/", $username)) {
		$errusername = "First name required!";
	} else if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$errmail = "A valid mail required!";
	} else if (empty($phone) || !preg_match("/^[0-9-+]*$/", $phone)) {
		$errphone = "Phone number required!";
	} else if (empty($password) || !preg_match("/^['a-zA-Z0-9']*$/", $password)) {
		$errpass = "Password required!";
	} else if (empty($repass)) {
		$errrepass = "Confirm password!";
	}
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
		
	if ($password == $repass) {
	
	$sql = $conn->prepare("INSERT INTO ugctable(username, mail, phone, password)VALUES(?, ?, ?, ?)");
		$sql->bind_param('ssss', $username, $mail, $phone, $hashedpassword);
		$sql->execute();
		
	} else {
		$pass_er =  "<p class='msg' >" ."password mismatch try again" . "</p>";
	}
	
	header("location:login.php");
}

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
		
		<header>
			<nav>
				<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"></a>
			</nav>
		</header>
		<div class="container">
		<div class="login" style="position: relative;">
			<div style="padding: 40px 5px; background-color: #fda100;">
				<?php echo  $pass_er; ?>
			<form method="post">
				USERNAME:<br />
				<input type="text" accesskey="0" required name="username" value="<?php echo $username; ?>"> <br />
				<?php echo $errusername; ?> <br />
				EMAIL:<br />
				<input type="email" required name="mail" value="<?php echo $mail; ?>"> <br />
				<?php echo $errmail; ?> <br />
				PHONE:<br />
				<input type="tel" required name="phone" value="<?php echo $phone ?>"> <br />
				<?php echo $errphone; ?> <br />
				PASSWORD:<br />
				<input type="password" required name="password" value="<?php echo $password ?>"> <br />
				<?php echo $errpassword; ?> <br />
				RETYPE-PASSWORD:<br />
				<input type="password" required name="repass"><br />
				
				<input type="submit" value="SIGNUP" name="submit">
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