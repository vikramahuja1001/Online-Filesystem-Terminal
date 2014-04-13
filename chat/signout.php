<?php
session_start();
include ('connect.php');

mysql_query("DELETE FROM messages WHERE user='".$_SESSION['username']."'");
?>
