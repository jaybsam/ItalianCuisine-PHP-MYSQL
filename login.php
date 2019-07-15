<?php
include("config/settings.php");

if(!empty($_POST)){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	$querystring = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'";
	$query = mysqli_query($conn, $querystring);
	
	$usercount = mysqli_num_rows($query);
	if($usercount == 0){
		header("Location: index.php?failed");
	}else{
		$data = mysqli_fetch_array($query);
		$_SESSION["key"] = "grant";
		$_SESSION["username"] = $data["username"];
		header("Location: index.php");
	
	}
}
?>
	 
	 
	
