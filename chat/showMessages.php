<?php
include('connect.php');

$result = mysql_query("SELECT id, message, user FROM messages");
//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "$row[user]: $row[message].<br>";
}

?>
