<html>
<head>
<title>Details Of Games</title>
</head>
<?php 
session_start();
if(isset($_SESSION['adminusername']))
{

include_once("toptemplate1.php");
include_once("hmenu.php");
include_once("../connection.php");
?>
<?php
$sql="select *  from login ";
$result=mysqli_query($con,$sql);
/*$sql3="select *  from signup_details ";
$result3=mysqli_query($con,$sql);*/
?> 
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>

<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of Game</font></h1>


<table width="1198" height="91" cellpadding="10px" cellspacing="10px" >
<thead>
<tr><th width="306" scope="col" background="../simple signup/img/323a45-2880x1800.png"><font size="+2">Name Of Users</font></th>
<th  width="389" scope="col" background="../simple signup/img/323a45-2880x1800.png" ><font size="+2">No. Of Times Rides offered </th>
<th  width="401" scope="col" background="../simple signup/img/323a45-2880x1800.png"><font size="+2">Details</th>
</tr>
</thead>
<tbody>
<?php
while($row=mysqli_fetch_array($result))
{
	/*$sql3="select *  from signup_details ";
	$result3=mysqli_query($con,$sql);*/
	$email=$row[1];
	//echo "<tr><td align='center'>".$name."</u></td>";
	$sql1=mysqli_query($con,"select * from login where email='".$email."'");
	$row1=mysqli_fetch_array($sql1);
	$reg =$row1[0];
	$sql3=mysqli_query($con,"select * from signup_details where reg_id='".$reg."'");
	$row3=mysqli_fetch_array($sql3);
$sql4=mysqli_query($con,"select * from signup_details");
	$row4=mysqli_fetch_array($sql4);
	echo "<tr><td align='center' style='color:#0099FF'>".$row3[1]."</u></td>";
	$sql2=mysqli_query($con,"select * from routedetails where reg_id='".$reg."'");
	echo "<td align='center' style='color:#0099FF'  >".mysqli_num_rows($sql2)."</td>";
	echo "<td align='center' style='color:#0099FF' ><a href=moredetailsuser.php?gameid=".$row['reg_id'].">More Details </a></td></tr>";
	
}
?>
</table><br><br><br>
<a href="report1.php"><font color="#990000" size="+2"><-Back to Report Page</font></a>

</body>
</html>
<?php
}
else
	header("location:../index.html");
?>