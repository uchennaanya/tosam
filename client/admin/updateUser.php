<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:index.php");
}

require_once('conn.php');
//$id = $_SESSION['id'];

$select = $conn->query("SELECT* FROM ugctable");

$row = mysqli_fetch_assoc($select);
	
$username = $balance = $erbalance = $erruser = "";

$selects = $conn->query("SELECT* FROM admntable");

$rows = mysqli_fetch_assoc($selects);
	
$username = $balance = $erbalance = $erruser = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$username = htmlspecialchars($_POST['username']);
	$balance = htmlspecialchars($_POST['balance']);
	
	
	if (empty($username) || !preg_match("/^[a-zA-Z]*$/", $username)) {
		$errusername = "First name required!";
		
	} else if (empty($balance) || !preg_match("/^[0-9]*$/", $balance)) {
		$erbalance = "Field balance is required!";
	
	} else {
		
		$sql = $conn->query("UPDATE ugctable SET username = '$username', balance = '$balance'");
		
		header("location:manage-users.php");
	}
}	

?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || Update user </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
	</head>
	<body>
		<header class="sideheader">
			<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo"></a>
			<nav class="sidenav">
				<a href="#"> admin dashboard</a>
				<a href='edit.php' > <i fa fa-user> </i> <span> edit admin </span> <?php echo $rows['username']; ?> </a>
				<a href="dashboard.php" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		<div class="container">
			<div class="view" >
				<table id="t01" >
					<tr>
						<th>S/No.</th>
						<th>Username</th>
						<th>mail</th>
						<th>Phone</th>
						<th>Balance</th>
						
						<th colspan="2" style="text-align: center;"> Action </th>
					</tr>
					<?php
						include("conn.php");
						$count=1;
						$sel_query = $conn->query("SELECT * FROM ugctable ORDER BY id DESC;");
						while($row = $sel_query->fetch_assoc()) {	
					?>
					
					<tr>
						<td align="center"><?= $count; ?></td>
						<td align="center"><?= $row["username"]; ?></td>
						<td align="center"><?= $row["mail"]; ?></td>
						<td align="center"><?= $row["phone"]; ?></td>
						<td align="center"><?= $row["balance"]; ?></td>
						
						<td align="center">
							<a href="updateUserAcc.php?id=<?=$row['id']; ?>"> Manage </a>
						</td>
						<td align="center">
							<a onClick="return confirm('your deleting a record! Comfirm.');" href="deleteUser.php?id=<?= $row['id']; ?>"> Suspend </a>
						</td>
					</tr>
					<?php
						$count++;
						} 
					?>
				</table>
			</div>
			
			</div>
	</body>
</html>