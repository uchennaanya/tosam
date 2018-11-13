<?php

session_start();
if (!isset($_SESSION['username'])) {
	
	header("location:home.php");
	
}
if(isset($_POST['btn_waec'])):
	require_once("libs/insertTransaction.php");
	require_once("libs/updateTransaction.php");

	$insert = new insertTransaction;
	$updateObj = new updateTransaction;

	$type = $_POST['type'];
	$pin = $_POST['pin'];
	$price = $_POST['price'];

	$dateRegistered = new DateTime();

	echo $insert->saveRecord($type,$pin,$price,$dateRegistered->format('Y-m-d H:i:s'));

endif;


if(isset($_POST['btn_waec'])):
	require_once("libs/insertTransaction.php");
	require_once("libs/updateTransaction.php");

	$insert = new insertTransaction;
	$updateObj = new updateTransaction;

	$type = $_POST['type'];
	$pin = $_POST['pin'];
	$price = $_POST['price'];

	$dateRegistered = new DateTime();

	echo $insert->saveRecord($type,$pin,$price,$dateRegistered->format('Y-m-d H:i:s'));

endif;

if(isset($_POST['btn_waec'])):
	require_once("libs/insertTransaction.php");
	require_once("libs/updateTransaction.php");

	$insert = new insertTransaction;
	$updateObj = new updateTransaction;

	$type = $_POST['type'];
	$pin = $_POST['pin'];
	$price = $_POST['price'];

	$dateRegistered = new DateTime();

	echo $insert->saveRecord($type,$pin,$price,$dateRegistered->format('Y-m-d H:i:s'));

endif;

?>

<!doctype html>
<html>
	<head>
		<title>admn || upload</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/style.css">
		<style>
			ul.tab {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				border: 1px solid #ccc;
				background-color: #f1f1f1;
			}

			ul.tab li {float: left;}

			ul.tab li a {
				display: inline-block;
				color: black;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				transition: 0.3s;
				font-size: 17px;
			}

			ul.tab li a:hover {background-color: #ddd;}

			ul.tab li a:focus, .active {background-color: #ccc;}

			.tabcontent {
				display: none;
				padding: 6px 12px;
				border: 1px solid #ccc;
				border-top: none;
			}
			.tabcontent {
				-webkit-animation: fadeEffect 1s;
				animation: fadeEffect 1s;
			}

			@-webkit-keyframes fadeEffect {
				from {opacity: 0;}
				to {opacity: 1;}
			}

			@keyframes fadeEffect {
				from {opacity: 0;}
				to {opacity: 1;}
			}

		</style>
	</head>
	<body>
		<header class="sideheader">
			<img src="assets/img/UGC%20Concept%20Logo.jpg" class="sidelogo">
			<nav class="sidenav">
				<a href="#"> admin dashboard </a>
				<a href='edit.php' > <i fa fa-user> <span> edith </span> </i> <?php echo $_SESSION['username']; ?> </a>
				<a href="dashboard.php" > <i class="fa fa-ready"> </i> Availabe Pin </a>
				<a href="upload.php" > <i class="fa fa-upload"> </i> Upload pin </a>
				<a href="logout.php" > <i class="log-out"> </i> logout </a>
			</nav>
		</header>
		<div class="container">
			<div class="content" style="height: 663px;">
				<div class="login">
				<ul class="tab">
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Neco')">Neco</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Jamb')">Jamb</a></li>
				  <li><a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'Waec')">Waec</a></li>
				</ul>
				<div id="Neco" class="tabcontent">
					<h3> Upload NECO Card Pin </h3>
					<form method="post">
						<input type="hidden" name="id">
						Pin Type/Name:<br />
						<input type="text" accesskey="0" name="type" > <br />
		<!--				<?php echo $errtype; ?> <br />-->
						Pin Number:<br />
						<input type="text" name="pin" > <br />
		<!--				<?php echo $errpin; ?> <br />-->
						Price:<br />
						<input type="tel" name="price" > <br />
		<!--				<?php echo $errprice; ?> <br />-->
						<input type="submit" value="UpLoad" name="upload" >
					</form>	
				</div>

				<div id="Jamb" class="tabcontent">
					  <h3>Uplaod JAMB Card Pin </h3>

						<form method="post">
							<input type="hidden" name="id">
							Pin Type/Name:<br />
							<input type="text" accesskey="0" name="type" > <br />
			<!--				<?php echo $errtype; ?> <br />-->
							Pin Number:<br />
							<input type="text" name="pin" > <br />
			<!--				<?php echo $errpin; ?> <br />-->
							Price:<br />
							<input type="tel" name="price" > <br />
			<!--				<?php echo $errprice; ?> <br />-->
							<input type="submit" value="UpLoad" name="upload" >
						</form>
					</div>


					<div id="Waec" class="tabcontent">
						 <h3>Upload WAEC Card Pin </h3>

						<form method="post">
							<input type="hidden" name="id">

							Pin Type/Name:<br />

							<input type="text" accesskey="0" name="type" > <br />

				<!--				<?php echo $errtype; ?> <br />-->
							Pin Number:<br />
								<input type="text" name="pin" > <br />
				<!--				<?php echo $errpin; ?> <br />-->
							Price:<br />
								<input type="tel" name="price" > <br />
				<!--		<?php echo $errprice; ?> <br />-->
							<input type="submit" value="UpLoad" name="upload" >
					</form>	
					</div>
				</div>
			</div>
		</div>
			
		<script>
			
			function openTab(evt, tabName) {
			
			var i, tabcontent, tablinks;

			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.className += " active";
			}
			
		</script>	
	</body>
</html>