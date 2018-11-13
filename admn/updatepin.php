<?php

session_start();

if (!isset($_SESSION['username'])) {
	
	header("location:home.php");
}

require_once('conn.php');
	
	$id = $_REQUEST['id'];
	$sql = $conn->query("SELECT* FROM admntable ");
	$row = mysqli_fetch_assoc($sql);
	$select = $conn->query("SELECT* FROM addpin WHERE id = '$id'");
	
	$rows = mysqli_fetch_assoc($select);
	
	$type = $pin = $price = $errormsg = $errtype = $errpin = $errprice = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$type = htmlspecialchars($_POST['type']);
		$pin = htmlspecialchars($_POST['pin']);
		$price = htmlspecialchars($_POST['price']);

		if (empty($type) || !preg_match("/^[a-zA-Z ]*$/", $type)) {
			$errtype ="<span class='msg'>" . "Field cannot be empty!" . "</span>";

		} else if (empty($pin) || !preg_match("/^[a-zA-Z 0-9]*$/", $pin)) {
			$errpin ="<span class='msg'>" . "Field cannot be empty!" . "</span>";

		} else if (empty($price) || !preg_match("/^[0-9-+]*$/", $price)) {
			$errprice = "<span class='msg'>" . "Field cannot be empty!" . "</span>";

		} else {

		$sql = $conn->prepare("UPDATE addpin SET type = ?, pin = ?, price = ? WHERE id = '$id'");

			$sql->bind_param('sss', $type, $pin, $price);

			$sql->execute();

			header("location:dashboard.php");
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
					<h3>UpDate profile</h3>
					<?php echo  $errormsg; ?>
					<form method="post">
						<input type="hidden" name="id" value="<?php echo $rows['id']; ?>" >
						Pin Type/Name: <br />
						<input type="text" accesskey="0" name="type" value="<?php echo $rows['type']; ?>" > <br />
						<?php echo $errtype; ?> <br />
						Pin Number: <br />
						<input type="text" name="pin" value="<?php echo $rows['pin']; ?>" > <br />
						<?php echo $errpin; ?> <br />
						Price: <br />
						<input type="text" name="price" value="<?php echo $rows['price']; ?>" > <br />
						<?php echo $errprice; ?> <br />
						<input type="submit" value="UpLoad" name="upload" >
					</form>
				</div>
			</div>
		</div>
	</body>
</html>