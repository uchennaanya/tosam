<?php
session_start();
	require_once"conn.php";
    $username = $password = $errormsg ="";
if (isset($_SESSION['username'])) {
	header("location:dashboard.php");
}
$erruser = $errpass = "";
if (isset($_POST['log_btn'])) {

	$username = txt($_POST['username']);
	$password = txt($_POST['password']);
	
    if ($log = $conn->query("SELECT * FROM admntable WHERE username = '$username' && pass = '$password' ")) {
		$row = mysqli_fetch_assoc($log);
		
		$_SESSION['username'] = $row['username'];
		if ($log = $log->num_rows > 0 ) {
			
			header("location:manage-users.php");
			
		}else if (empty($username) || empty($password)){
                $errormsg = "<span class= 'msg'>" . "Both feild are required" . "</span>";   
            } else {
        	$errormsg = "<span class= 'msg'>" . "Wrong input try again" . "</span>";
    	}
    }
}

    function txt($txt) {
        $txt = stripslashes($txt);
        $txt = htmlspecialchars($txt);
		$txt = trim($txt);
        return $txt;
    }
?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || AdminDashBoard </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<link rel="stylesheet" href="../css/styl.css">
		<link rel="stylesheet" href="assets/css/bootstrap.css" media="all">
	</head>
	<body>
		<div class="mail"> Contact@yahoo.com</div>
		
		<div class="container-fluid">
			
		  <div class="row">
			  
				<nav class="navbar navbar-inverse " style="background-color: #fda100; color: black; border: none; border-radius: 0; padding-left: 9%">
					
						<a href="index.php"><img src="assets/img/UGC%20Concept%20Logo.jpg" class="logo navbar-brand" ></a>
				  </nav>
			  </div>
			</div>
		<div class="container-fluid">
			<div class="row" style="height: 350px">

				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form method="post">
					<div class="form-group">

						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username">
							<?php echo $erruser; ?>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
						<?php echo $errpass; ?>
					</div>
					<div class="form-group">
						<input type="submit" name="log_btn" class="btn btn-success" value="login">
					</div>
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