<?php include_once("includes/global.php");


if($logged==0){
	header("Location:index.php");
	exit();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOME</title>

<link rel="stylesheet" type="text/css" href="css/home_style.css" />

</head>

<body>



<div class="loader"></div>

<div id="main">


<div id="custom-menu">
<ol>
<li><a href="#" onclick="hide()">Reply</a> </li>
<li><a href="#" onclick="hide()">Reply All</a> </li>
<li class="list-devider">
<hr />
</li>
<li><a href="#" onclick="hide()">Settings</a> </li>
<li><a href="background.php" onclick="hide()">Change Background</a> </li>
<li><a href="home.php" onclick="hide()" >Refresh</a> </li>
<li class="list-devider">
<hr />
</li>
<li><a href="logout.php" >LOGOUT</a> </li>
</ol>
</div>


<a class="button" href="#">Click Me</a>

</div>


<div id="box">
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery_ui.min.js"></script>
<script type="text/javascript" src="js/blur.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.bouncebox.1.0.js"></script>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html>
