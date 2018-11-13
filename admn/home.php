<?php
session_start();
	require_once"conn.php";
    $username = $password = $errormsg ="";
if (isset($_SESSION['username'])) {
	header("location:dashboard.php");
}

if (isset($_POST['log_btn'])) {

	$username = txt($_POST['username']);
	$password = txt($_POST['password']);
	
//	
    if ($log = $conn->query("SELECT * FROM admntable WHERE username = '$username' && pass = '$password' ")) {
		$row = mysqli_fetch_assoc($log);
		
		$_SESSION['username'] = $row['username'];
		if ($log = $log->num_rows > 0 ) {
			
			header("location:dashboard.php");
			
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
		<link rel="stylesheet" href="assets/css/style.css" media="all">
	</head>
	<body>
		<div class="container" style="height: 662px;">
			<div class="login">
				<div style="padding: 10px 5px; background-color: #fda100; margin: 100px auto;">
					<span style="font-size: 20px; color: #000; display: block;"> Admin Log In </span>

					<?php echo $errormsg; ?>

					<form method="post">
						Username:<br />
						<input type="text" accesskey="0" name="username"> <br />
<!--						<?php echo $erruser; ?> <br />-->
						Password:<br />
						<input type="password" name="password"> <br />
<!--						<?php echo $errpass; ?> <br />-->
						<input  type="submit" name="log_btn" value="Login" >
					</form>
				</div>
			</div>
		</div>
	</body>
</html>