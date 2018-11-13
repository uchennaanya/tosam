<?php

session_start();

require_once ('conn.php');

if (ISSET($_SESSION['username'])) {
	
	header("location:profile.php");	
}

$username = $errormsg = $password = $errpass = $erruser = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	if (empty($username) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$erruser = "<span class='msg'>" . " Field required ! " . "</span";
		
	} else if (empty($password) || !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
		$errpass = "<span class='msg'>" . " Field required ! " . "</span";
	} else {
		
		$sql = $conn->query("SELECT* FROM ugctable WHERE username = '$username'");
		$row = mysqli_fetch_assoc($sql);
		
	   	if (password_verify($password, $row['password']) && $sql->num_rows == 1) {
		   $_SESSION['username'] = $row['username'];
		header("location:profile.php");
	   	} else {
		   
		   $errpass = "<span class = 'msg'>" . " Invalid password ! " . "</span>";
	   }		
	}
		
	$conn->close();	
}	
 
?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || LoginPage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="stylesheet" href="assets/css/styl.css" media="all">
	</head>
	<body>	
		<div class="mail">Contact@yahoo.com</div>
		
		<header>
			
			<a href="index.php"> <img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo"> </a>
			<nav> 

				<a href="signup.php"> REGISTER </a> 
				
			</nav>
			
		</header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
				
					<div style = "margin: 20% 0%" >
					<h3> Log In </h3>
					<?php echo $errormsg; ?>
						<form method="post">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control">
								<?php echo $erruser; ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control">
								<?php echo $errpass; ?>
							</div>
							<div class="form-group">

								<input type="submit" name="loginbtn" value="Login" class="btn btn-success"> New user ? <a href="signup.php">Register.</a>

							</div>
						</form>
					</div>
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