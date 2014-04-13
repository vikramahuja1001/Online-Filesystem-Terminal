<?php

// Create connection
mysql_connect("localhost","root","root");
@mysql_select_db("project") or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//execute the SQL query and return records
$result = mysql_query("SELECT id, message, user FROM messages");
//fetch tha data from the database
//while ($row = mysql_fetch_array($result)) {
 //  echo "ID:".$row{'id'}." Name:".$row{'message'}."
   //".$row{'user'}."<br>";
//}

?>
