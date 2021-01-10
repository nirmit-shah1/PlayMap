<html>
<title>Particular Game detail</title>
<body>
<?php
 
session_start();
if(isset($_SESSION['adminusername']))
{

	include_once("toptemplate3.php");
	include_once("../connection.php");
	include_once("hmenu3.php");
	$gameid=$_GET['gameid'];
	$routeid=$_GET['routeid'];
	$sql1=mysqli_query($con,"select * from routedetails  where mid='".$routeid."'");
	$sql2=mysqli_query($con,"select * from membergamingdetails  where mid='".$routeid."'");
	$sql3=mysqli_query($con,"select * from typeofgame  where mid='".$routeid."'");
	$row2=mysqli_fetch_array($sql2);
	$row3=mysqli_fetch_array($sql3);

	?>
	<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of Game</font></h1>
	<table cellspacing="10px" cellpadding="10px">
	<?php
	while($row1=mysqli_fetch_array($sql1))
	{
			echo "<tr><td>Source location</td><td>".$row1[2]."</td></tr>";
			echo "<tr><td>Venue location</td><td>". $row1[3]."</td></tr>";
			echo "<tr><td>Famous Landmark 1</td><td>". $row1[4]."</td></tr>";
			echo "<tr><td>Famous Landmark 2</td><td>". $row1[5]."</td></tr>";
			echo "<tr><td>Price Per Traveller </td><td>". $row2[2]."</td></tr>";
			echo "<tr><td>Place avaiable </td><td>". $row2[3]."</td></tr>";
			echo "<tr><td>Experience</td><td>". $row2[4]."</td></tr>";
			echo "<tr><td>Game Starts</td><td>". $row2[5]."</td></tr>";
			echo "<tr><td>Delay</td><td>". $row2[6]."</td></tr>";
			echo "<tr><td>Date Of Game</td><td>". $row3[3]."</td></tr>";
			echo "<tr><td>Time Of Game</td><td>". $row3[4]."<br>";
	}
	?>
	</table>
<?php	echo "<a href=moredetails.php?routeid=".$routeid."&gameid=".$gameid."><font color='#FF0000' size='+2'><<-Back To Route Details Page </font></a>";	?>
	</div>
	</body>
	</html>
<?php
}
else
{
header("location:../index.html");
}
?>


