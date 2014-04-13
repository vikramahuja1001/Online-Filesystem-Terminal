<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<title>Activate your account to my website</title>

</head>

<body>
<?php include_once("includes/global.php");
$message='';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
	// Verify data  
	$email = mysql_escape_string($_GET['email']); // Set email variable  
	$hash = mysql_escape_string($_GET['hash']); // Set hash variable  

	$search = mysql_query("SELECT email, hash, active FROM members WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
	$search1 = mysql_query("SELECT email, hash, active FROM members WHERE email='".$email."' AND hash='".$hash."' AND active='1'") or die(mysql_error());


	$match  = mysql_num_rows($search);
	$match1  = mysql_num_rows($search1);


	if($match > 0)
	{
		// We have a match, activate the account  
		mysql_query("UPDATE members SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
		$message="Your account has been activated, you can now login";
	}
	else
	{
		if($match1 >  0)
		{
			// No match -> invalid url or account has already been activated.  
			$message="You already have activated your account.";
		}
		else if($match1 == 0)
		{
			// No match -> invalid url or account has already been activated.  
			$message="The url is invalid.";
		}
	}
}
else
{
	// Invalid approach  
	$message="Invalid approach, please use the link that has been send to your email.";
}
?>


<h1><p><?php print("$message");?></p></h1>
</body>
</html>

