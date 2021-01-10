<html>
		<title>User game details</title>	
			<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>

<?php
session_start();
if(isset($_SESSION['emailcommanusername']))
{	
	$_SESSION['searchvalue']=1;
	include_once("toptemplate1.php");
	include_once("hmenu.php");
	include_once("../connection.php");
	$id=$_GET['pid'];
		$mid=$_GET['mid'];
	$_SESSION['pid']=$id;
	$_SESSION['memberid']=$mid;
	$sql2=mysqli_query($con,"select * from membergamingdetails  where reg_id='".$id."' AND mid='".$mid."'");
	$row2=mysqli_fetch_array($sql2);

	$num=(int)$row2[3];
	$num=$num-1;
	
	if($num<=0)
	{
		$num="FULL";
		
	}
	$sql_update=mysqli_query($con,"update membergamingdetails SET spaceavailable='".$num."' where reg_id='".$id."' AND mid='".$mid."'" );
	//-----------------------------------------------------------GET DATA FROM  -----------------------------------------------
	$sql3=mysqli_query($con,"select * from typeofgame  where reg_id='".$id."' AND mid='".$mid."'");
	$row3=mysqli_fetch_array($sql3);
	$reg_id=$_SESSION['reg_id'];
	$date1=date('y-m-d');
	//-----------------------------------------------------------INSERT INTO BOOKING -----------------------------------------------
	$j=mysqli_query($con,"insert into booking(reg_id,hid,gid,gdate,gtime,cdate)  values('$reg_id','$id','$mid','$row3[3]','$row3[4]','$date1')");
?>	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Search Result of Game</font>
			</h1>
	
<img src="img1/green-tick.jpg" />YOUR PLACE IN THE GAME HAS BEEN BOOKED
	<br>
	<a href="demo2.php"><font color="#330000" size="+2"><-Back To Search Page</font></a>
	<br>
	</div>
	</body>
	</html>
	
<?php
}
else
	header("location:../index.html");	
//<form action='viewdetailsback.php'>
//<input style='margin-top:-20px; margin-left:-1px;' type='submit' value='send message>>
?>