<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mj";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {

	echo "connection failed". $conn ->connect_error;
}
else{
	echo"connection successfull"; 
}
//variables 
$email = $password = $encrypted = '';
$emailErr = $passwordErr = '';

$_SESSION['userUnaivable'] = "Wrong credentials, try again or create an account";
$_SESSION['alertTypeError'] = "danger";
 
if (isset($_POST['login'])) {
	# code...
	if (empty($_POST['emailLog'])) {
		# code...
		$emailErr = "email required";
	} else {
		$email = $_POST['emailLog'];
	}

	if (empty($_POST['passLog'])) {
		# code...
		$passwordErr = "email required";
	} else {
		$password = $_POST['passLog'];
	}

	if (empty($emailErr) && empty($passwordErr)) {
		# code...
		$loginSql = "SELECT * FROM users WHERE email='$email' && password='" .md5($password) .  "'";
		$result = mysqli_query($conn,$loginSql);

		//finding no of row matching the query
		$num = mysqli_num_rows($result);

		

		if ($num == 1) {
			# code...
			$_SESSION['activeuser'] = $email;
			header('location: ../productpage/index.php?logged');
		} else {
			$_SESSION['userUnaivable'];
			header('location: ../landingpage/index.html?wrongCredLogin');
		}
	}



}



?>