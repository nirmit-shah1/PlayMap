<html>

	<head>
	<title>Forget Password</title>
	<link href="style-box.css"  rel="stylesheet" type="text/css" >
	</head>
<?php	
session_start();
	include("../toptemplate.php");
	include("hmenu1.php");
	$uinfo=$_GET["uinfo"];
	include_once("connection.php");
	
?>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Forget Password</font>
			</h1>
			
</div>
</body>
</html>