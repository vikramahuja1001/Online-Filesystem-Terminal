<?php include_once("includes/global.php"); 
if($logged==1)
{
		header("Location:home.php");
			exit();
}



?>
<html>
<head>
<title>Welcome to my website</title>
</head>

<body>
<h1>Welcome to my website</h1>
<a href="login.php">Login</a> | <a href="register.php">Register</a>
</body>
</html>
