<?php include 'functions.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Alcoholic Drinks</title>
	<link rel="stylesheet"  href="styles/style.css">
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

	<!----------------------------Header and navigation ----------------->
	<div class="top">
		<h3>Get Special 40% off on all the alcoholic drinks  above £ 10/-</h3>
		
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
			<p>Taste a life full of <br>celebration.</p>

			
		</div>
	</header>

	<!----------------------------All the products  ----------------->

	<p>Our all available Alcoholic Drinks  </p>

	<?php

$drinks = get_drinks();

?>

<main>
  

  <div class="store">
    <div class="container">
      <?php if (mysqli_num_rows($drinks)) { ?>
        <div class="drinks flex">
          <?php foreach ($drinks as $drink) { ?>
            <div class="drink">
              <div class="image">
                <img src="assets/images/<?= $drink['image'] ?>" alt="" />
              </div>
              <div class="content">
                <h3><?= $drink['name'] ?></h3>
                <p class="description">
                  <?= $drink['description'] ?>
                </p>
                <p class="price">£<?= $drink['price'] ?></p>
                <div class="flex quantity">
                  <span class="add" data-item="<?= $drink['d_id'] ?>"> + </span>
                  <span class="number" id="number-<?= $drink['d_id'] ?>">1</span>
                  <span class="subtract" data-item="<?= $drink['d_id'] ?>"> - </span>
                </div>
                <div class="add-to-basket">
                  <form action="add-to-cart.php" method="POST">
                    <input type="hidden" name="d_id" value="<?= $drink['d_id'] ?>">
                    <input type="hidden" id="item-<?= $drink['d_id'] ?>" name="quantity" value="1">
                    <button type="submit" name="add-to-cart" class="btn">Add To Basket</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</main>

	<!----------------------------Footer  ----------------->


	<div class="footer">

		<div class="conatiner">

			<div class="row">
				<div class="footer-col-1">
					<img src="Images/play-store.png" width="200px" height="50px">
					<img src="Images/app-store.png" width="200px" height="50px">

					
					<p id="Para">Download our app for android and ios</p>
				</div>


				<div class="footer-col-2">
					<img src="Images/Logo.png" width="190px" height="150px">
					<p id="para">Our purpose is to  sustainably make the pleasure.</p>
				</div>



				<div  id="Follow">
					<h5 id="us">Follow us</h5>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>
				
			</div>

			
		</div>
		
	</div>


	

	


</body>
</html>