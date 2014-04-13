<?php
session_start();
include_once("connect.php");
//checking if the sessions are set
if(isset($_SESSION['username'])){
	$session_username=$_SESSION['username'];
	$session_pass=$_SESSION['pass'];
	//check if the member exists
	$query=mysql_query("SELECT * FROM users WHERE username='$session_username' AND password='$session_pass' LIMIT 1") or die("Could nor check members");
	$count_count=mysql_num_rows($query);
	if($count_count>0){
		//he is logged in
		$logged=1;
	}
	else{
		$_SESSION['username']= $_COOKIE['email_username'];
		$_SESSION['pass']= $_COOKIE['password'];
		header("Location:logout.php");
		exit();
	}
}
else{
	//if the user is not logged in
	$logged=0;
}

?>
