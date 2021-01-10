	<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<title>Update Page</title>
	</head>

<?php 
session_start();
if(isset($_SESSION['adminusername']))
{ 
	include_once("toptemplate3.php");
		include_once("hmenu3.php");
	include_once("../connection.php");
	//$ra=$_GET['did'];
	function clear($name)
	{
	$con=mysqli_connect("localhost","root","","playmap");
		$sql=mysqli_query($con,"delete from `$name` where reg_id=".$_GET['did']);
	}
	
	function clear1($name)
	{
	$con=mysqli_connect("localhost","root","","playmap");
		$sql=mysqli_query($con,"delete from `$name` where sid='".$_GET['did']."' OR sid='".$_GET['did']."'");
	}
	clear('signup_details');
	clear('typeofgame');
	clear('images');
	clear('login');
	clear('alias');
	clear('membergamingdetails');
	clear('booking');
	clear('counter');
	clear1('friend_request');
	clear('privacy');
	clear('postal');
	clear('routedetails');
	clear('comment');
	clear('counter');
	clear('logincount');
	clear('prating');
	clear('rating');
	clear('usersecurityanswer');
	?>
	<html>
<title>Delete Page</title>
	<body style=" background-image:url(img1/tandc.jpg);background-repeat:no-repeat;background-size:cover;">

	<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;"> <font color="#000000">&nbsp;&nbsp;Notification</font>
			</h1>
	<img src="img1/delete-256-000000.png" />The Account Of the User Has Deleted
	<br>
	<a href="admin.php"><font color="#330000" size="+2"><-Back To Admin Page</font></a>
	<br>
	</div>
	</body>
	</html>
<?php
}
else
	header("location:../index.php");
?>