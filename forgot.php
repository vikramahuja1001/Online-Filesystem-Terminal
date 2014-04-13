<?php include_once("includes/global.php");

if($logged==1)
{
	header("Location:home.php");
}
if(isset($_POST['email_username'])){
	$email=$_POST['email_username'];

	if((!$email)){
		$message="Please Enter Your Email/Username";
	}
	else{
		$email=mysql_real_escape_string($email);
		$query=mysql_query("SELECT * FROM users WHERE email='$email' OR username='$email' LIMIT 1") or die("Wrong Information");
		$count_query=mysql_num_rows($query);
		if($count_query!=0){
			$query=mysql_query("SELECT * FROM users WHERE email='$email' OR username='$email' LIMIT 1") or die("Wrong Information");
			while($row = mysql_fetch_array($query)){
			              $email= $row['email'] ;
				      $hash = $row['hash'];
			}

		}
		else{
			$message="No such username or Email";
		}
	}

}


?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<title>Reset Password</title>
</head>
<body>
<h1>Enter Your Email or Username</h1>
<p><?php print("$message");?></p>
<form action="forgot.php" method="post">
<input type="text" name="email_username" placeholder="Email Id/Username" /></br>
<input type="submit" name="reset" value="Reset" />
</form>
</body>
</html>
