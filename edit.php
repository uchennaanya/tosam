<?php

session_start();

require_once('conn.php');

$id = $_SESSION['username'];

$select = $conn->query("SELECT * FROM ugctable WHERE id = '$id'");

$row = mysqli_fetch_assoc($select);

	
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
	
	$sql = $conn->prepare("UPDATE ugctable SET username = ?, mail = ?, phone =?, password = ? WHERE id = ?");
		$sql->bind_param('sssss', $username, $mail, $phone, $hashedpassword, $id);
		$sql->execute();
		$_SESSION['username'] = $username;
		
	}
	
	header("location:login.php");

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
			<div style="padding: 50px 5px; background-color: #fda100;">
				<?php echo  $pass_er; ?> <br>
			<form method="post">
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
				USERNAME:<br />
				<input type="text" accesskey="0" required name="username" value="<?php echo $row['username']; ?>"> <br />
				<?php echo $errusername; ?> <br />
				EMAIL:<br />
				<input type="email" required name="mail" value="<?php echo $row['mail']; ?>"> <br />
				<?php echo $errmail; ?> <br />
				PHONE:<br />
				<input type="tel" required name="phone" value="<?php echo $row['phone']; ?>"> <br />
				<?php echo $errphone; ?> <br />
				PASSWORD:<br />
				<input type="password" required name="password" value="<?php echo $row['password']; ?>"> <br />
				<?php echo $errpassword; ?> <br />
				RETYPE-PASSWORD:<br />
				<input type="password" required name="repass" value="<?php echo $row['password']; ?>"> <br />
				
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