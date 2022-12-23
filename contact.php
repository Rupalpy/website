<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
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

    <div class="top">
        <h3>Connect with US.......</h3>
        
    </div>
    <header>

        <div class="row">
            <div class="logo">
                <img src="Images/Logo.png " height="150px" width="200px">
                
            </div>

            <ul class="main-nav">
            <li><a href="index.php">Home</a></li>
				<li><a href="Alcoholic.php">Alcoholic</a></li>
				<li><a href="Non-alcoholic.php">Non-Alcoholic</a></li>
				<?php 
                session_start();
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
            <p>Connect with Us..</p>
            
        </div>
        
    </header>


    <h3 id="Contact">Contact Form</h3>
    <?php 
			$Msg="";
			if(isset($_GET['error'])){
				$Msg="please fill blanks";
				echo '<div class="alert alert-danger">'.$Msg.'</div>';
			}
			if(isset($_GET['success']))
            {
                $Msg = " Your Message Has Been Sent ";
                echo '<div class="alert alert-success">'.$Msg.'</div>';
            }
			?>

<div class="container">
<form action="contactprocess.php" method="POST">
  
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="UName" placeholder="John ">

    <label for="lname">Email</label>
    <input type="text" id="lname" name="Email" placeholder="johndoe@gmail.com">


    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="Britain">Britain</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="msg" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name="btn-send" value="Submit">
    </form>
  
</div>

</body>
</html>