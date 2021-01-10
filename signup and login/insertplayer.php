<?php
session_start();
if(isset($_SESSION['emailcommanusername']))
{		
	ob_start();
	include_once("../connection.php");
	include_once("toptemplate1.php");
	include_once("hmenu.php");
	
	$pid=$_SESSION['playerid'];
	$hid=$_SESSION['reg_id'];
	if(isset($_POST['rating']))
	{
		$rate=$_POST['rating'];
	}
	else
		$rate="";
	if(isset($_POST['taComment']))
	{
		$comment=$_POST['taComment'];
	}
	else
	{
		$comment="";
	}
	
	if($rate=="" && $comment=="")
	{
		$_SESSION['error']=1;
		header("location:ratingpassangerdetails.php");
	}
	else
	{
	
		$test=mysqli_query($con,"select * from prating where hid='".$hid."' AND pid='".$pid."'");
		if(($data=mysqli_fetch_array($test))==NULL)
		{
			$sql1= "insert into prating(pid,hid,rate,comment) values('$pid','$hid','$rate','$comment')";
			$state=mysqli_query($con,$sql1);
		}
		else
		{
		  	 $sql = "update prating set rate='".$rate."' , comment='".$comment."' where hid='".$hid."' AND pid='".$pid."'";
			$state=mysqli_query($con,$sql);
	}?>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Rate Game Player</font></h1>
	<img src="img1/like.png" height="400" width="350" /><br />
	<h2 style="color:#66FF33; font-size:34px; padding-left: 31px;">Thank You For Giving Feedback About Game Hoster</h2> <br />
	<a href="rateplayer.php" style="color:#990000; font-size:29px; padding-left: 31px;">Back To Rating Page</a>
	</div>
	</body>
	</html>		
	<?php
	}
}

else
	header("location:../index.html");
	?>