<?php
//connnect to the controller

session_start();
require("../controllers/conn.php");

$errors = array();
$Username='';
//check if submit button was clicked
if (isset($_POST['register'])) {
	// grad user form data
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pass = $_POST['pass1'];
	$conf_pass = $_POST['pass2'];

	if(empty($fname) || empty($lname)){
		$errors['username'] = "First Name or Last name is empty";
	}
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Email required";
	}
	if (empty($pass)) {
		$errors['password'] = "Password Required";
	}
	if ($pass !== $conf_pass) {
		$errors['pass'] = "Your passwords don't match";
	}
	$query = "SELECT * FROM user WHERE Email=? LIMIT 1";
	$prep = $conn-> prepare($query);
	$prep->bind_param("s",$email);
	$prep->execute();
	$result = $prep->get_result();
	$prep->close();

	if(($result->num_rows)>0){
		$errors['email'] = "Email Already exist";
	}if(count($errors)===0) {
		$passharsh = password_hash($pass, PASSWORD_DEFAULT);
		$emailQuery = "INSERT INTO user (FirstName, LastName, Email,Password,phoneNumber) VALUES ('$fname', '$lname', '$email','$passharsh','$phone')";
		$prep = $conn-> prepare($emailQuery);
		if($prep->execute()){
			$userID = $conn->insert_id;
			$_SESSION['id'] = $userID;
			$_SESSION['username'] = $fname;
			$_SESSION['email'] = $email;
			$_SESSION['phone'] = $phone;

			//Flash Messages
			$_SESSION['email'] = "Congratulations you are now registered";
			$_SESSION['alert-class'] = "alert-success";
			header('location: search_page.php');
			exit();

		}
		else{
			$errors['db_error'] = "Database Error".$conn->error;
			print_r($errors);
		}
		
		}else{
			header('location:logReg.php');
		}
	}


if (isset($_POST['login'])) {
	$email = $_POST["email"];
	$password = $_POST["pass2"];

	if(empty($email)){
		$errors['email'] = "Invalid Email";
	} 
	if (empty($password)) {
		$errors['pass'] = "Invalid Password";
	}if (count($errors)===0) {

		$query = "SELECT Password FROM user WHERE Email=$email";
		$prep = $conn-> prepare($query);
		$prep->execute();
		$result = $prep->get_result();
		$user = $result->fetch_assoc();
		echo $_POST["pass2"] , $user['Password'];
		$psw=password_verify($_POST["pass2"], $user['Password']);
		if($psw){
			////Sessions
			$_SESSION['id'] = $user['id'];
			$_SESSION['username'] = $user['FirstName'];
			$_SESSION['username2'] = $user['LastName'];
			$_SESSION['Phone'] = $user['phoneNumber'];
			$_SESSION['email'] = $user['Email'];

			//Flash Messages
			$_SESSION['message'] = "Welcome";
			$_SESSION['alert-class'] = "alert-success";
			header('location: search_page.php');
			exit();

		}else{
			echo "<script>alert('Incorrect Email or Password')</script>";
		}
	}
}
//insert to database

?>