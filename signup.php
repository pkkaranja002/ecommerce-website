
<!DOCTYPE html>
<html>
<head>
	<title>MJ HOUSEHOLD</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background: url('images/mj.jpg');background-position:center;background-repeat: no-repeat;background-size: cover;margin-top: 90px;">
	<?php
		require 'authentification/register.php';
	?>
		<p class="alert alert-<?php
			if (isset($_GET['registered'])){
				echo$_SESSION['classTypeSuccess'];
				session_unset();
				session_destroy();
			}elseif (isset($_GET['notreg'])){
				echo$_SESSION['classTypeError'];
				session_unset();
				session_destroy();
			}

		?>">
			<?php
			if (isset($_GET['registered'])){
				if (isset($_SESSION['classTypeSuccess'])) {
					
				echo $_SESSION['classTypeSuccess'];
				session_unset();
				session_destroy();
				}
				else {
					echo "user registered";
				}
				
			}elseif (isset($_GET['notreg'])){
				if (isset($_SESSION['classTypeError'])) {
				echo $_SESSION['classTypeError'];
				session_unset();
				session_destroy();
				}
				else {
					 echo "user not registered";
				}
			}


		?>





		</p>
<div class="signup-form">
    <form action="authentification/register.php" method="post" style="width:45px;width: 450px; margin: 0 auto;padding: 30px 0; font-size: 15px; background-color:transparent;">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
       
        <div class="form-group" style=":background: #222; box-shadow: 0 0 1rem rgba(0,0,0,0.3);">
        	<input type="username" class="form-control" name="username" placeholder="username" required="required" style="background: transparent";>
        </div>
        <div class="form-group" style=":background: #222; box-shadow: 0 0 1rem rgba(0,0,0,0.3);">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required" style="background: transparent";>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"style="background: transparent";>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required" style="background: transparent";>
            <span id="message"></span>
        </div> 
       

        <div class="form-group" >
			<label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" name= "save" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="signin.php">Sign in</a></div>
</div>


</body>
</html>




