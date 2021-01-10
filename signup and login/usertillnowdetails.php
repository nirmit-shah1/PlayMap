<?php 
session_start();
if(isset($_SESSION['adminusername']))
{

include_once("toptemplate3.php");
include_once("hmenu3.php");
include_once("../connection.php");

$id=$_GET['detailsid'];
//syntax for displaying data
$sql=mysqli_query($con,"select * from login  where reg_id='".$id."'");
$row=mysqli_fetch_array($sql);
$sql1=mysqli_query($con,"select * from signup_details  where reg_id='".$id."'");
$row1=mysqli_fetch_array($sql1);
$sql2=mysqli_query($con,"select * from images  where reg_id='".$id."'");
$row2=mysqli_fetch_array($sql2);
$sql3=mysqli_query($con,"select * from routedetails  where reg_id='".$id."'");
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of User</font></h1>
<table  cellpadding="20">
<?php
echo "<tr><td colspan='2'><img align='middle'  src='images/".$row2[1]."' height='250px' width='350px' ></td></tr>";					
echo "<tr><td>First Name Of User:-</td>";
echo "<td>".$row1[1]."</td></tr>";
echo "<tr><td>Last Name Of User:-</td>";
echo "<td>".$row1[2]."</td></tr>";
echo "<tr><td>Email-id Of User:-</td>";
echo "<td>".$row[1]."</td></tr>";
echo "<tr><td>Contact No Of User:-</td>";
echo "<td>".$row1[4]."</td></tr>";
echo "<tr><td>Gender Of User:-</td>";
echo "<td>".$row1[3]."</td></tr>";
echo "<tr><td>Registration Date  Of User:-</td>";
echo "<td>".$row1[6]."</td></tr>";
echo "<tr><td>No. Of Games Hosted By User:-</td>";
echo "<td>".mysqli_num_rows($sql3)."</td></tr>";
?>
</table><br />
<a href="usertillnow.php"><font color="#990000" size="+2"><-Back to Registered User Page</font></a>
</div>
</body>
</html>
<?php
}
else
	header("location:../index.html");
?>