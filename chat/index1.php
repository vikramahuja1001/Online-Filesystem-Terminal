<?php include_once("../includes/global.php");

if($logged==0)
{
	header("Location:index.php");
}
if(isset($_POST['email_username'])){
	$email=$_POST['email_username'];
	// checking if everything is filled

	if(!$email){
		$message="Fill it";
	}
	else{
		//securing the data
		$email=mysql_real_escape_string($email);
		//checking for duplicates
		$query=mysql_query("SELECT * FROM users WHERE email='$email' OR username='$email' LIMIT 1") or die("Could not get the username");
		$count_query=mysql_num_rows($query);
		if($count_query==0){
			$message="No Such User Exists";
		}
		else{

			while($row = mysql_fetch_array($query))
			{
				$username= $row['username'] ;
			}
			$query=mysql_query("SELECT * FROM logged_in_logs WHERE username='$username' LIMIT 1") or die("Could not get the username");

			$count_query=mysql_num_rows($query);
			if($count_query==0){
				$message="User not online but you can still send him messages. :)";
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=windows-1252" http-equiv="content-type">
<title>CHAT ROOM</title>
</head>
<body>
<h1>CHAT ROOM</h1>
<p><?php print("$message");?></p>
<input type="text" name="email_username" placeholder="Email Id/Username" /></br>
<div id="search">
<input type="submit" name="submit" value="Search" onclick='search()'/>
</div>
<div id="logout">
<input type='button' value='Logout' onClick='logout()'> </div>
</body>
</html>
