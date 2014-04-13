<?php include_once("includes/global.php");
if($logged==1)
	header("Location:home.php");

$message='';
if(isset($_POST['username'])){

	$username=$_POST['username'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];

	// checking if everything is filled

	if((!$username)||(!$fname)||(!$lname)||(!$email)||(!$pass1)||(!$pass2)){
		$message="Fill everything";
	}
	else{
		if($pass1!=$pass2){
			$message="Your passwords do not match";
		}
		else{

			//securing the data
			$username=preg_replace("#[^0-9a-z]#i","",$username);
			$fname=preg_replace("#[^0-9a-z]#i","",$fname);
			$lname=preg_replace("#[^0-9a-z]#i","",$lname);
			$pass1=sha1($pass1);

			$email=mysql_real_escape_string($email);

			//checking for duplicates

			$user_query=mysql_query("SELECT username FROM users WHERE username='$username' LIMIT 1") or die("Could not get the username");
			$count_user=mysql_num_rows($user_query);

			$email_query=mysql_query("SELECT email FROM users WHERE email='$email' LIMIT 1") or die("Could not get the email");
			$count_email=mysql_num_rows($email_query);

			if($count_user>0){
				$message="This username is alredy in use";
			}
			else if($count_email>0)
			{
					$message="This email is already in use";}
			else{
				//inserting in db
				$ip_address=$_SERVER['REMOTE_ADDR'];
				$hash=md5(rand(0,1000));
				$code=rand(100000,999999); 
				$query=mysql_query("INSERT INTO users(username,firstname,lastname,email,password,ip_address,sign_up_date,hash,activation)VALUES('$username','$fname','$lname','$email','$pass1','$ip_address',now(),'$hash','$code')") or die("Could not insert to the database");
				$result=mysql_query($query);
				$member_id=mysql_insert_id();
				mkdir("users/$member_id",0775);

				$to      = $email; // Send email to our user  
				$subject = 'Signup | Verification'; // Give the email a subject   
/*				$messages = ' 

					Thanks for signing up! 
					Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. 

					------------------------ 
					Username: '.$username.' 
					Password: '.$pass2.' 
					------------------------ 

					Please click this link to activate your account: 

					http://localhost/website/verify.php?email='.$email.'&hash='.$hash.' 

					'; // Our message above including the link  

				$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers  
				mail($to, $subject, $messages, $headers); // Send our email  
*/
				header("Location:done.html");	

			}
		}}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<title>Register to my website</title>

<body>
<h1>Register to my website my filling below</h1>
<p><?php print("$message");?></p>
<form action="register.php" method="post">
<input type="text" name="username" placeholder="Username" /></br>
<input type="text" name="fname" placeholder="First Name" /></br>
<input type="text" name="lname" placeholder="Last Name" /></br>
<input type="text" name="email" placeholder="Email Id" /></br>
<input type="password" name="pass1" placeholder="Password" /></br>
<input type="password" name="pass2" placeholder="Retype Password" /></br>
<input type="submit" value="Register" />

</form>
</body>
</html>
