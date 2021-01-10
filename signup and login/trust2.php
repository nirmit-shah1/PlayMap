<?php
	session_start();
	if(isset($_SESSION['adminusername']))
	{	
		include("toptemplate3.php");
		include("hmenu3.php");
		include("../connection.php");
		
?>
<html>

	<head>
	<link href="style-box.css"  rel="stylesheet" type="text/css" >
	</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Trust</font>
			</h1>
			<br>
			Trust is at the centre of all communities, and Car Pooling is no exception.<br><br>
 On PlayMap, every time two members meet in real life they publicly rate each other.<br><br>
  And allowing the members to build up a trusted community reputation.<br><br>
 This means that before you play with another member you can read their ratings and benefit from the experience of other members.<br><br>
  If a member has been declared trustworthy by several people in the past, you can trust them too.<br><br>
			
			

<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>
