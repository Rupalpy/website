<?php include'functions.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sippers</title>
	<link rel="stylesheet"  href="Styles/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css" />
<style>
	.main-nav li a{
		color: black;
	}
</style>
</head>
<body>

	<div class="top">
		<h3>Order Now to get   SPECIAL😍DISCOUNT..... HURRY UP!!!</h3>
		
	</div>
	<header>

		<div class="row">
			<div class="logo">
				<img src="images/Logo.png " height="150px" width="200px">
				
				
			</div>

			<ul class="main-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="Alcoholic.php">Alcoholic</a></li>
				<li><a href="Non-alcoholic.php">Non-Alcoholic</a></li>
				<?php 
						if(isset($_SESSION['username'])){?>
								<li><a href="logout.php">Logout </a></li>
							<?php }else{ ?>
								<li><a href="login.php">Login </a></li>
								<li><a href="register.php">Register </a></li>
							<?php } ?>
						<li><a href="mycart.php">My Cart </a></li>
				<li><a href="Contact.php">Contact us </a></li>

				
			</ul>
			
		</div>

		<div class="Text">
			<p>It’s like a party for.... <br>my taste buds.</p>
			
		</div>

		<div class="button">
			<a href="Alcoholic.html" class="btn btn-one">ALCOHOLIC</a>
			<a href="Non-alcoholic.html" class="btn btn-two">NON-ALCOHOLIC</a>
			
		</div>


		
	</header>



	

</body>
</html>