<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:home.php");
}

require_once('conn.php');
//$id = $_SESSION['id'];

$select = $conn->query("SELECT* FROM admntable");

$row = mysqli_fetch_assoc($select);
	
$username = $password  = $repass = $errrepass = $erruser = $errpass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$username = htmlspecialchars($_POST['username']);
	$pass = htmlspecialchars($_POST['pass']);
	$repass = htmlspecialchars($_POST['repass']);
	
	if (empty($username) || !preg_match("/^[a-zA-Z]*$/", $username)) {
		$errusername = "First name required!";
		
	} else if (empty($pass) || !preg_match("/^[a-zA-Z]*$/", $pass)) {
		$errpass = "Give password!";
	
	} else if ($pass != $repass) {
		$errrepass = "password must match!";
	} else {
		
		$sql = $conn->query("UPDATE admntable SET username = '$username', pass = '$pass'");
		
		header("location:home.php");
	}
}	

?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || EditPage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
	</head>
	<body>
		<header class="sideheader">
			<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo"></a>
			<nav class="sidenav">
				<a href="#"> admin dashboard</a>
				<a href='edit.php' > <i fa fa-user> </i> <span> edith </span> <?php echo $row['username']; ?> </a>
				<a href="dashboard.php" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		<div class="container">
			<div class="login">
				<div >
					<h3>UpDate profile</h3>
					<?php echo  $errpass; ?>

					<form method="post">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						Username: <br />
						<input type="text" accesskey="0" required name="username" value="<?php echo $row['username']; ?>"> <br />
						<?php echo $erruser; ?> <br />
						Password: <br />
						<input type="password" required name="pass" value="<?php echo $row['pass']; ?>"> <br />
						<?php echo $errpass; ?> <br />
						Confirm Password: <br />
						<input type="password" required name="repass" > <br />
						<?php echo $errrepass; ?> <br />

						<input type="submit" value="UpDate" name="submit">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>