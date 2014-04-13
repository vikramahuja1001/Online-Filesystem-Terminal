<?php include_once("includes/global.php");


if($logged==0){
	header("Location:index.php");
	exit();
}
?>


<!DOCTYPE html>
<html>
<head>


<meta http-equiv="refresh" content="6;URL='home.php'">
<title>Apple-style Splash Screen | Tutorialzine Demo</title>

<link rel="stylesheet" type="text/css" href="css/welcome_style.css" />
<link rel="stylesheet" type="text/css" href="css/splashscreen.css" />

<script src="js/jquery.min.js"></script>
<script src="js/jquery.splashscreen.js"></script>
<script src="js/welcome.js"></script>

</head>
<body>

<div id="page">
<div id="promoIMG">
</div>
</div>

</body>
</html>
