<?php
include("config/settings.php");

if(!empty($_POST)){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$email = $_POST["email"];
	
	if($username == "" || $password == "" || $email == ""){
		header("Location: index.php?failed");
	}
	
	$querystring  = "INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL, '".$username."', '".$password."', '".$email."')";
	$query = mysqli_query($conn, $querystring);
	
	header("Location: index.php");
}
?>

	 