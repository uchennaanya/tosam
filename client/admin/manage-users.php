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
            <a href="#" class="logo"><b> Admin </b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
           
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/UGC%20Concept%20Logo.jpg" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['username'];?></h5>
              	  	

                  <li class="mt">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                   
                  </li>
				  <li class="sub-menu">
                      <a href="editprofile.php" >
                          <i class="fa fa-edit"></i>
                          <span>Edit profile</span>
                      </a>
                   
                  </li>

<!--
                  <li class="sub-menu">
                      <a href="users.php" >
                          <i class="fa fa-users"></i>
                          <span> Users</span>
                      </a>
					  
                  </li>
-->

                  <li class="sub-menu">
                      <a href="available-card.php" >
                          <i class="fa fa-file"></i>
                          <span>Available Cards</span>
                      </a>
                   
                  </li>

                  <li class="sub-menu">
                      <a href="upload-pin.php">
                          <i class="fa fa-upload"></i>
                          <span>Upload pin</span>
                      </a>
                  </li>
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
				<div class="row">
				
                  <div class="col-md-12">
                      <div class="content-panel">
						  <div class="table-responsive">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
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
						
						<td align="center" colspan="2">
							
							<a href="updateUserAcc.php?id=<?=$row['id']; ?>" > Manage </a>
						
							<a onClick="return confirm('your deleting a record! Comfirm.');" href="deleteUser.php?id=<?= $row['id']; ?>" >  <i class="fa fa-info"></i>Suspend </a>
						</td>
					</tr>
					<?php
						$count++;
						} 
					?>
                          </table>
                      </div>
                  </div>
              </div>
			  </div>
		</section>
      </section
  ></section>
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
