<?php include_once("includes/global.php");
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
$ip_address=$_SERVER['REMOTE_ADDR'];
$username=$_SESSION['username'];
$query=mysql_query("DELETE FROM logged_in_logs WHERE username='$username' AND ip='$ip_address'") or die("Could not delete from the logged_in_logs database");
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!

// Finally, destroy the session.
header("Location:index.php");
session_destroy();
?>
