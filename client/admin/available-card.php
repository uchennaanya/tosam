<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:home.php");	
}

include"conn.php";

$sql = $conn->query("SELECT * FROM addpin");
$row = mysqli_fetch_assoc($sql);

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
              	  <h5 class="centered">Admin: <?php echo $_SESSION['username'];?></h5>
              	  	

                  <li class="mt">
                      <a href="manage-users.php" >
                          <i class="fa fa-send"></i>
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
	                  	  	  <h4><i class="fa fa-angle-right"></i> Available Cards </h4>
	                  	  	  <hr>
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
						<td align="center" colspan="2">
							<a href="updatepin.php?id=<?=$row['id']; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i>  </a>
						
						
							<a onClick="return confirm('your deleting a record! Comfirm.');" href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i> </a>
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
