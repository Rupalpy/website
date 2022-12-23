<?php

require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
		else{
			echo"<script>
			alert('cannot run query');
			window.location.href='index.php';
			</script>";
		}
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
	
        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
			echo"<script>
			alert('registration successful');
			window.location.href='login1.php';
			</script>";
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
	else
	{
		
	}
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register and Login</title>
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
		<h3> Register and Login</h3>
		
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
			<p>Register</p>
			
		</div>
	</header>

    <div class="container">
        <h1>Register</h1>
        <p id="Fill">Please fill in this form to create an account.</p>
        <hr>
    
		<span onclick="register()"></span>

		<form id="Regform" method="POST" action="">
        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="username"  required>
    
        <label ><b>Password</b></label>
        <input type="password" placeholder="Password"  name="password"  required>
    
        <label ><b>Repeat Password</b></label>
        <input type="password" placeholder=" confirm password" name="confirm_password" required>
        <hr>
       
    
        <button type="submit" class="registerbtn" name="register">Register</button>
		</form>
      </div>
  






	

</body>
</html>