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
	// echo"connection successfull"; 
}
$usernames = $email = $password = $encrypted_pass = '';
$usernameErr = $emailErr = $passwordErr = '';

//session variables 
$_SESSION["reg"] = "Registration Successful";
$_SESSION["noreg"] = "Registration not Successful";
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";


if (isset($_POST['save']) ){
	# code...

	if (empty($_POST['username'])) {
		# code...
		$usernameErr = "username is required";
	} else {
		$usernames = $_POST['username'];
	}

if (empty($_POST['email'])) {
		# code...
		$emailErr = "email is required";
	} else {
		$email = $_POST['email'];
	}

if (empty($_POST['password'])) {
		# code...
		$passwordErr = "password is required";
	} else {
		$password = $_POST['password'];
		//encrypting my password 
		$encrypted_pass = md5($password);
	}
if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
		# code...
		//prepare the statement
		$stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
		$stmt->bind_param("sss",$usernames,$email,$encrypted_pass);

		if ($stmt->execute() === TRUE) {
			# code...
            $_SESSION["reg"];
			$_SESSION['classTypeSuccess'];
			header('location: ../signin.php?registered=true');

		} else {
						# code...
            $_SESSION["noreg"];
			$_SESSION['classTypeError'];
			header('location: ../signup.php?notreg=false');

		}
	}
}

?>