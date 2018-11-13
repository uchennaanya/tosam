<?php

session_start();
if(!isset($_SESSION['username'])){
	header("location:home.php");	
}

include"conn.php";

$sql = $conn->query("SELECT * FROM admntable");
$row = mysqli_fetch_assoc($sql);
?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || DashBoard </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css" media="all">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
	</head>
	<body>
		<header class="sideheader">
			<a href="#"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo"></a>
			<nav class="sidenav">
				<a href="#" class="active"> admin dashboard </a>
				<a href='edit.php' > <i fa fa-user> </i> <span> edith </span> <?php echo $row['username']; ?> </a>
				<a href="updateUser.php" > <i class="fa fa-ready"> </i> Update user </a>
				<a href="#" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		
		<input type="hidden" name="id">

		<div class="container">
			<div class="view" >
				<table id="t01" >
					<tr>
						<th>S/No.</th>
						<th>CardType</th>
						<th>Card Pin</th>
						<th>Price</th>
						<th>Status</th>
						<th>DateTime</th>
						<th colspan="2" style="text-align: center;"> Action </th>
					</tr>
					<?php
						include("conn.php");
						$count=1;
						$sel_query = $conn->query("SELECT * FROM addpin ORDER BY id DESC;");
						while($row = $sel_query->fetch_assoc()) {	
					?>
					
					<tr>
						<td align="center"><?= $count; ?></td>
						<td align="center"><?= $row["type"]; ?></td>
						<td align="center"><?= $row["pin"]; ?></td>
						<td align="center"><?= $row["price"]; ?></td>
						<td align="center">
							<?= "<span style='color:green;'>".$row["status"]."</span>"; ?>
						</td>
						<td align="center"><?= $row["date"]; ?></td>
						<td align="center">
							<a href="updatepin.php?id=<?=$row['id']; ?>"> Edit </a>
						</td>
						<td align="center">
							<a onClick="return confirm('your deleting a record! Comfirm.');" href="delete.php?id=<?= $row['id']; ?>"> Delete </a>
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