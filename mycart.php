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

<body>
<?php

$cart = get_cart();
if (isset($cart)) {
  $drinks = get_drinks_by_ids($cart);
}

?>

<main>
  <div class="internal-header">
  
    <?php if (!mysqli_num_rows($drinks)) { ?>
      <p>Basket is empty</p>
    <?php } ?>
  </div>

  <div class="basket">
    <div class="container">
      <?php if (mysqli_num_rows($drinks)) { ?>
        <div class="basket-items">
          <?php foreach ($drinks as $drink) { ?>
            <div class="basket-item">
              <div class="image">
                <img src="images/<?= $drink['image'] ?>" alt="image" />
              </div>
              <div class="content">
                <h3><?= $drink['name'] ?></h3>
                <p class="price">£<?= $drink['price'] ?></p>
                <div class="flex quantity">
                  <span class="add" data-item="<?= $drink['d_id'] ?>"> + </span>
                  <span class="number" id="number-<?= $drink['d_id'] ?>"><?= $cart[$drink['d_id']] ?></span>
                  <span class="subtract" data-item="<?= $drink['d_id'] ?>"> - </span>
                </div>
                <div class="add-to-basket">
                  <form action="add-to-cart.php" method="POST">
                    <input type="hidden" name="d_id" value="<?= $drink['d_id'] ?>">
                    <input type="hidden" id="item-<?= $drink['d_id'] ?>" name="quantity" value="<?= $cart[$drink['d_id']] ?>">
                    <button class="btn" type="submit" name="update-to-cart">Update</button>
                    <button class="btn btn-danger" name="remove-from-cart">Remove</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div style="margin-top: 100px;">
          <a href="checkout.php" class="btn">Total: - <?= get_total() ?>£ Checkout</a>
        </div>
      <?php } ?>
    </div>
  </div>
</main>

</body>
</html>