<?php

session_start();

if (!isset($_SESSION['username'])) {
	
	header("location:home.php");
}

require_once('conn.php');
	
	$id = $_REQUEST['id'];
	$sql = $conn->query("SELECT* FROM ugctable ");
	$row = mysqli_fetch_assoc($sql);
	$select = $conn->query("SELECT* FROM ugctable WHERE id = '$id'");
	
	$rows = mysqli_fetch_assoc($select);
	
	$balance = $erbalance = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		
		$balance = htmlspecialchars($_POST['balance']);

		if (empty($balance) || !preg_match("/^[0-9 ]*$/", $balance)) {
			$eruser ="<span class='msg'>" . "Field cannot be empty!" . "</span>";

			} else {
			$sql = $conn->prepare("UPDATE ugctable SET balance = ? WHERE id = '$id'");

			$sql->bind_param('s', $balance);

			$sql->execute();

			header("location:updateUser.php");
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
			<a href="index.php"> <img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo"> </a>
			<nav class="sidenav">
				<a href="#"> admin Updatepin </a>
				<a href='edit.php' > <i fa fa-user> </i> <span > edith </span> <?php echo $row['username']; ?> </a>
				<a href="dashboard.php" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		<div class="container">
			<div class="login">
				<div >
					<h3>Your updating: <?php echo $rows['username']; ?> </h3>
					
					<form method="post">
						<input type="hidden" name="id" value="<?php echo $rows['id']; ?>" >
						
						Balance: <br />
						<input type="text" name="balance" value="<?php echo $rows['balance']; ?>" > <br />
						<?php echo $erbalance; ?> <br />
						<input type="submit" value="Up date" name="upload" >
					</form>
				</div>
			</div>
		</div>
	</body>
</html>