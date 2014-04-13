<?php include_once("../includes/global.php");
session_start();

if (isset($_POST['message'])) {
	mysql_query("INSERT INTO messages(sender_id,reciever_id,message,datetime)VALUES('$username','$fname','$message',now())") or die("Could not insert to the database");

}
?>
