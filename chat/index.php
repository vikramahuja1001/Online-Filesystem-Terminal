<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body >
<div id="container">

<div id="messages">
</div>

<div id="senddiv">
<textarea id="message" rows="5" cols="40"></textarea><input type="button" onClick="sendMessage()" value="Send">
</div>

<div id="search">
Username/Email:<input type="text" id="username_email" size="16"> <input type='button' value='Search' onClick='search()'>
</div>

<div id="logout">
<input type='button' value='Logout' onClick='logout()'>
</div>
<div id=message">
</div>

</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/showMessages.js"></script>
<script type="text/javascript" src="js/postMessage.js"></script>
<script type="text/javascript" src="js/signinout.js"></script>




</body>
</html>
