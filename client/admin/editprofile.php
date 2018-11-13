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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Admin</b></a>
           
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/UGC%20Concept%20Logo.jpg"  width="100" height="70"></a></p>
              	  <h5 class="centered">Admin: <?php echo $_SESSION['username'];?></h5>
              	  	

                  <li class="mt">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="available-card.php" >
                          <i class="fa fa-file"></i>
                          <span>Available Cards</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="editprofile.php" >
                          <i class="fa fa-edit"></i>
                          <span>Edit profile</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="upload-pin.php">
                          <i class="fa fa-upload"></i>
                          <span>upload pin</span>
                      </a>
                  </li>
<!--
				  
				  <li class="sub-menu">
                      <a href="logout.php">
                          <i class="fa fa-leaf"></i>
                          <span>Logout</span>
                      </a>
                  </li>
-->
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Update admin profile</h3>
				<div class="row"> 
                  <div class="col-md-8">
					  
					  <h3>Your updating: <?php echo $row['username']; ?> </h3>
					  
					  <form method="post">
						  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
						  <div class="form-group">
							  <label for="username">username</label>
							  <input type="text" name="username" value="<?php  echo $row['username']; ?>" class="form-control">
							  	<?php echo $erruser; ?> <br />
							
						  </div>
						  <div class="form-group">
							  <label for="password">Password</label>
							  <input type="password" name="password" placeholder="Password" class="form-control">
							  	<?php echo $errpass; ?> <br />
							
						  </div>
						  <div class="form-group">
							  <label for="confirm">Confirm password</label>
							  <input type="password" name="repass" placeholder="Confirm Password" class="form-control">
							  	<?php echo $errrepass; ?> <br />
							
						  </div>
						  <div class="form-group">
						  
							  <input type="submit" name="submit" value="UpDate" class="btn btn-success">
						  
						 </div>
					</form>
				</div>
			</div>
		</section>
	</section>
 </section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
