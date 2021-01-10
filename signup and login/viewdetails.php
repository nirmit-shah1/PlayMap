0<?php
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
	$_SESSION['memberid']=$id;
	$sql1=mysqli_query($con,"select * from routedetails where reg_id='".$id."' AND mid='".$mid."'");
	$sql2=mysqli_query($con,"select * from membergamingdetails where reg_id='".$id."' AND mid='".$mid."'");
	$sql3=mysqli_query($con,"select * from typeofgame where reg_id='".$id."' AND mid='".$mid."'");
	$result=mysqli_query($con,"select * from signup_details where reg_id='".$id."'");
	//$result=mysqli_query($con$sql);
	?>
	<html>
		<title>User game details</title>	
			<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Search Result of Game</font>
			</h1>
	<table style="margin-left:10px;" cellpadding="5px;">

	<?php while($row=mysqli_fetch_array($result))
	{
		echo "<tr><td>Name Of Hoster:-</td>";
		echo"<td>".$row[1];
		echo "&nbsp;".$row[2]."</td>";
		echo "<td><a href='viewdetailofdriver.php?driverid=$id'>View Profile</a></td></tr>";
		echo "<tr><td>Contact No:-</td>";
		echo "<td>".$row[3]."</td></tr>";
		$row1=mysqli_fetch_array($sql1);
		echo "<tr><td>Venue location:-</td><td>".$row1[3]."</td></tr>";	
		echo "<tr><td>Famous Landmark:-</td><td>".$row1[4]."</td></tr>";	
		echo "<tr><td>Famous Landmark:-</td><td>".$row1[5]."</td></tr>";	
		$row3=mysqli_fetch_array($sql3);
		echo "<tr><td>Game Date:-</td><td>".$row3[3]."</td></tr>";	
		echo "<tr><td>Game Time:-</td><td>".$row3[4]."</td></tr>";
		$row2=mysqli_fetch_array($sql2);
		echo "<tr><td>Price Per Player:-</td><td>".$row2[2]."</td></tr>";	
		echo "<tr><td>Players required:-</td><td>".$row2[3]."</td></tr>";
		echo "<tr><td>Experience in Game:-</td><td>".$row2[4]."</td></tr>";		
		echo "<tr><td>Will Wait:-</td><td>".$row2[5]."</td></tr>";	
		echo "<tr><td>Delay:-</td><td>".$row2[6]."</td></tr>";
		$num=$row2[3];
		if(!($num=="FULL"))
		{
		?>
		<tr><td colspan="2" align="center"><form action="finalbook.php?pid=<?php echo $id;?>&mid=<?php echo $mid;?>" method="post">
		<input type="submit" value="RESERVE PLACE IN GAME" name="book" style="background-color:#CC3300; font-size:16px; color:#FFFFFF;"></form></td></tr></table>
	<?php }
	}
	?>
	</div>
		</body>

	</html>
<?php
}
else
	header("location:../index.php");
//<form action='viewdetailsback.php'>
//<input style='margin-top:-20px; margin-left:-1px;' type='submit' value='send message>>
?>