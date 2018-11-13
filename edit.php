<?php

session_start();
if (!ISSET($_SESSION["username"])) {
    header("location:login.php");
}

require_once('conn.php');

$id = $_SESSION['username'];

$select = $conn->query("SELECT * FROM ugctable WHERE username = '$id'");

$row = mysqli_fetch_assoc($select);
	
$username = $mail = $phone = $password = "";
$pass_er = $errusername = $errmail = $errphone = $errpassword = $errrepass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$username = htmlspecialchars($_POST['username']);
	$mail = htmlspecialchars($_POST['mail']);
	$phone = htmlspecialchars($_POST['phone']);
	
	if (empty($username) || !preg_match("/^[a-zA-Z]*$/", $username)) {
		$errusername = "First name required!";
	} else if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$errmail = "A valid mail required!";
	} else if (empty($phone) || !preg_match("/^[0-9-+]*$/", $phone)) {
		$errphone = "Phone number required!";
		
		$errrepass = "Confirm password!";
	}
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	
	$sql = $conn->prepare("UPDATE ugctable SET username = ?, mail = ?, phone =? WHERE username = ?");
	
		$sql->bind_param('ssss', $username, $mail, $phone, $id);
		$sql->execute();
		$_SESSION['username'] = $username;
	
	header("location:login.php");
		
	}

?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || EditPage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/styl.css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css">
	</head>
	<body>
		
		<div class="mail">Contact@yahoo.com</div>
		
		<header>
			<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"></a>
		</header>
		<div class="container">
		<div class="login">
			<div >
				<h3>UpDate profile</h3>
				<?php echo  $pass_er; ?>
				
				<form method="post">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form=control">
					USERNAME:<br />
					<input type="text" accesskey="0" required name="username" value="<?php echo $row['username']; ?>" class="form=control"> <br />
					<?php echo $errusername; ?> <br />
					EMAIL:<br />
					<input type="email" required name="mail" value="<?php echo $row['mail']; ?>" class="form=control"> <br />
					<?php echo $errmail; ?> <br />
					<div class="form-group">
						<label for="phone">Phone</label>
				
						<input type="tel" required name="phone" value="<?php echo $row['phone']; ?>" class="form=control"> 
						<?php echo $errphone; ?> <br />
					</div>
					<input type="submit" value="UpDate" name="submit">
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