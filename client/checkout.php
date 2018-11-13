<?php

require_once('conn.php');

$username = $mail = $phone = $password = "";
$pass_er = $errusername = $errmail = $errphone = $erramount =  "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$mail = htmlspecialchars($_POST['mail']);
	$phone = htmlspecialchars($_POST['phone']);
	$amt = htmlspecialchars($_POST['amt']);
	$date = new DateTime();
	$datetime = $date->format('y:m:s:h');
	
	if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$errmail = "A valid mail required !";
	} else if (empty($phone) || !preg_match("/^[0-9-+]*$/", $phone)) {
		$errphone = "Phone number required !";
	} else if (empty($amt) || !preg_match("/^['a-zA-Z0-9']*$/", $amt)) {
		$errpass = "Specify amount !";
	
	} else {
	
	$sql = $conn->prepare("INSERT INTO transaction(mail, phone, amt)VALUES(?, ?, ?)");
		
		$sql->bind_param('ssss', $mail, $phone, $amt);
		
		$sql->execute();	
	}
}

?>

<!doctype html>
<html lang="en">
	<head>
		<title> UGC || SignPage </title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styl.css" media="all">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
	</head>
	<body>		
		<div class="mail">Contact@yahoo.com</div>
		
		<div class="container-fluid">
			
		  <div class="row">
			  
				<nav class="navbar navbar-inverse " style="background-color: #fda100; color: black; border: none; border-radius: 0; padding-left: 9%">
					
					<a href="index.php"><img src="img/UGC%20Concept%20Logo.jpg" class="logo navbar-brand" ></a>
				</nav>
			  </div>
			</div>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-4"></div>
			
				<div class="col-md-4">
				
					<div clas.s="login" >
		
							<h3> UGC checkout form </h3>
							<?php echo  $pass_er; ?>
							<form method="post">
								<div class="form-group">
								
									<label for="name" >Name</label>
									<input type="text" accesskey="0" name="mail" class="form-control">
								
								</div>
								
								<div class="form-group">
								
									<label for="phone" >phone</label>
									<input type="text" name="phone" class="form-control">
								
								</div>
								<div class="form-group">
								
									<label for="amount" >Amount</label>
									<input type="text"  name="amount" class="form-control">
								
								</div>
								<div class="form-group">
									
								<script src="https://js.paystack.co/v1/inline.js"></script>
								<button type="button" onclick="payWithPaystack()" class="btn btn-success"> Pay </button> 
									
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
		
		<script>
		  function payWithPaystack(){
			var handler = PaystackPop.setup({
			  key: 'pk_test_082554b140e5723605d799e1470fe616c55d4282',
			  email: 'customer@email.com',

			  ref: ''+Math.floor((Math.random() * 1000000000) + 1),
				 generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
			  metadata: {
				 custom_fields: [
					{
						display_name: "Mobile Number",
						variable_name: "mobile_number",
						value: "+2348012345678"
					}
				 ]
			  },
			  callback: function(response){
				  alert('success. transaction ref is ' + response.reference);
			  },
			  onClose: function(){
				  alert('window closed');
			  }
			});
			handler.openIframe();
		  }
		</script>
	</body>
</html>