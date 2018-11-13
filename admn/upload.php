<?php

session_start();
if (!isset($_SESSION['username'])){
	
	header("location:home.php");
}
	
require_once('conn.php');

$sql = $conn->query("SELECT* FROM admntable");
$row = mysqli_fetch_assoc($sql);
$type = $pin = $price = $errormsg = $errtype = $errpin = $errprice = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$type = htmlspecialchars($_POST['type']);
	$pin = htmlspecialchars($_POST['pin']);
	$price = htmlspecialchars($_POST['price']);
	$id = htmlspecialchars($_POST['id']);
	$status = "Active";
	
	$date = new DateTime();
	$dateTime = $date->format('Y-m-d H:i:s');
	
	if (empty($type) || !preg_match("/^[a-zA-Z ]*$/", $type)) {
		$errtype = "Specify type !";
		
	} else if (empty($pin) || !preg_match("/^[a-zA-Z 0-9 ]*$/", $pin)) {
		$errpin = "Give pin !";
		
	} else if (empty($price) || !preg_match("/^[0-9-+]*$/", $price)) {
		$errprice = "How much are selling the card !";
		
	} else {
	
	$sql = $conn->prepare("INSERT INTO addpin(type, pin, price, status, date)VALUES(?, ?, ?, ?, ?)");
		
		$sql->bind_param('sssss',  $type, $pin, $price, $status, $dateTime);
		
		$sql->execute();
		
		$errormsg = "<span class = 'msg'>" . "Submitted continue ... " . "</span>";
	}			
}
	
?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || upload pins </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
	</head>
	<body>
		
		<header class="sideheader">
			<a href="index.php"> <img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo"> </a>
			<nav class="sidenav">
				<a href="#"> admin dashboard </a>
				<a href='edit.php' > <i fa fa-user> <span> edith </span> </i> <?php echo $row['username']; ?> </a>
				<a href="dashboard.php" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		<div class="container">
			<div class="login" >
				<div >
					<h3> Pin Upload </h3>
					<?php echo  $errormsg; ?>
					<form method="post">
						<input type="hidden" name="id">
						Pin Type/Name:<br />
						<select name="type">
							<option value="" selected>Select card type</option>
							<option value="WAEC" >WAEC</option>
							<option value="JAMB" >JAMB</option>
							<option value="NECO" >NECO</option>
						</select><br />
						<?php echo $errtype; ?> <br />
						Pin Number:<br />
						<input type="text" name="pin" > <br />
						<?php echo $errpin; ?> <br />
						Price:<br />
						<input type="tel" name="price" > <br />
						<?php echo $errprice; ?> <br />
						<input type="submit" value="UpLoad" name="upload" >
					</form>
				</div>
			</div>
		</div>
	</body>
</html>