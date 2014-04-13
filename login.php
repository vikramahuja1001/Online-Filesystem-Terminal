<?php include_once("includes/global.php");

if($logged==1)
{
	header("Location:home.php");
}
$year = time() + 31536000;
setcookie('email_username', $_POST['email_username'], $year);
setcookie('password', $_POST['pass'], $year);
$message='';
if(isset($_POST['email_username'])){
	$email=$_POST['email_username'];
	$pass=$_POST['pass'];
	$remember=$_POST['remember'];
	// checking if everything is filled

	if((!$email)||(!$pass)){
		$message="Fill it";
	}
	else{
		//securing the data
		$pass=sha1($pass);
		$email=mysql_real_escape_string($email);
		//checking for duplicates
		$query=mysql_query("SELECT * FROM users WHERE email='$email' OR username='$email' AND password='$pass' LIMIT 1") or die("Could not get the username");
		$count_query=mysql_num_rows($query);
		if($count_query==0){
			$message="Your information was incorrect";
		}
		else{

			$query1=mysql_query("SELECT verified FROM users WHERE email='$email' or username='$email' LIMIT 1") or die("Could not get the username");

			while($row = mysql_fetch_array($query1))
			{
				$active= $row['active'] ;
			}

			if($active==0)
			{

				$_SESSION['pass']=$pass;
				while($row=mysql_fetch_array($query)){
					$username=$row['username'];
					$id=$row['user_id'];
				}
				$_SESSION['username']=$username;
				$_SESSION['user_id']=$id;
				print("$username");
				$ip_address=$_SERVER['REMOTE_ADDR'];
				$query=mysql_query("INSERT INTO logged_in_logs(username,datetime,ip)VALUES('$username',now(),'$ip_address')") or die("Could not insert to the logged_in_logs database");
				header("Location:welcome.php");
			}

			else if($active==1)
			{
				header("Location:activate.html");
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<title>Register to my website</title>
</head>
<body>
<h1>Login to my website</h1>
<p><?php print("$message");?></p>
<form action="login.php" method="post">
<input type="text" name="email_username" placeholder="Email Id" value="<?php echo $_COOKIE['email_username']; ?>"/></br>
<input type="password" name="pass" placeholder="Password" value="<?php echo $_COOKIE['password']; ?>" /></br>
<input type="checkbox" name="remember" <?php if(isset($_COOKIE['email'])) {
	echo 'checked="checked"';
}
else {
	echo '';
}
?> >Remember Me</br>
<a href="forgot.php">Forgot Password</a></br>
<input type="submit" name="login" value="Login" />
</form>
</body>
</html>
