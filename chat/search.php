<?php include_once("../includes/global.php");

$email=$_POST['email_username'];
// checking if everything is filled
//echo "hi";

if(!$email){
	//$message="Fill it";
	echo "FILL IT";
}
else{
	//securing the data
	$email=mysql_real_escape_string($email);
	//checking for duplicates
	$query=mysql_query("SELECT * FROM users WHERE email='$email' OR username='$email' LIMIT 1") or die("Could not get the username");
	$count_query=mysql_num_rows($query);
	if($count_query==0){
		//$message="No Such User Exists";
		echo "NO SUCH USER EXISTS";
	}
	else{

		while($row = mysql_fetch_array($query))
		{
			$username= $row['username'] ;
		}
		$query=mysql_query("SELECT * FROM logged_in_logs WHERE username='$username' LIMIT 1") or die("Could not get the username");

		$count_query=mysql_num_rows($query);
		if($count_query==0){
			//$message="User not online but you can still send him messages. :)";
			echo "User not online but you can still send him messages. :)";

		}
	}
}

?>

