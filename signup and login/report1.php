<?php
session_start();
if(isset($_SESSION['adminusername']))
{
?>
<html>
<head>
	<style type="text/css">
		.card-text{

			color:#4286f4;
			font-weight: bold;
		}
		.card-body{
			background-color: #b8ffa8;
		}

	</style>
	</head>
<title>Report Page</title>
<body>
<?php 
include_once("../connection.php");
include_once("toptemplate3.php");
include_once("hmenu3.php");

function noofuser()
{
global $con;
$sql="select * from signup_details";
$result=mysqli_query($con,$sql);
echo "<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function noofuserdaily()
{
	global $con;
$date1=date('y-m-d');
$sql="select * from signup_details where date='".$date1."' ";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function gameoffernow()
{
global $con;
$sql="select * from game";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function imageuploadtillnow()
{
	global $con;
$sql="select * from images";
$result=mysqli_query($con,$sql);
 echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function statesaddedtillnow()
{
	global $con;
$sql="select * from state";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function cityaddedtillnow()
{
	global $con;
$sql="select * from city";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function areraaddedtillnow()
{
	global $con;
$sql="select * from area";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}
function nooflogin()
{
	global $con;
$b=0;
$sql=mysqli_query($con,"select * from logincount");
while($row=mysqli_fetch_array($sql))
{
 $a=$row['logincounter'];
	$b+=$a;
}
echo "<font size='+2'>".$b."</font>";

}
function noofratingtohoster()
{
global $con;
$sql="select * from rating";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";

}
function noofratingtoplayer()
{
global $con;
$sql="select * from prating";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";

}



?><br>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>

<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of Game</font></h1>
<br><br>
<div class="container">
	
	<div class="row">
		<div class="col-sm-4">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <p class="card-text"> Users Register till now on The Site</p>
			    <a href="#" class="card-link btn btn-warning">	<?php noofuser();?></a>
			    <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
			  </div>
			</div>
		</div>
	
		<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p  class="card-text"> Users Register Daily The Site</p>
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="card-link btn btn-warning">	<?php  noofuserdaily();?></a>
				   
				  </div>
				</div>
		</div>

		<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number Of Games Hosted Till Now By Individuals</p>
				    <a href="#" class="card-link btn btn-warning">	<?php gameoffernow();?></a>
				    <a href="gameoffer.php" class="card-link btn btn-primary">Get Details</a>
				  </div>
				</div>
		</div>
	</div>
<br>
	<div class="row">
		<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number Of Games Hosted Till Now</p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <a href="#" class="card-link btn btn-warning">	<?php gameoffernow(); ?></a>
				
				  </div>
				</div>
		</div>
		
			<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number Of Images Uploaded Till Now </p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <a href="#" class="card-link btn btn-warning">	<?php imageuploadtillnow(); ?></a>
				
				  </div>
				</div>
		</div>

			<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number  Of States Added Till Now </p>
				    <a href="#" class="card-link btn btn-warning">	<?php statesaddedtillnow(); ?></a>
				    <a href="statestillnow.php" class="card-link btn btn-primary">Get Details</a>
				  </div>
				</div>
		</div>
			

	</div>
		<br>
	<div class="row">
		<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number of Cities Added Till Now </p>
				    <a href="#" class="card-link btn btn-warning">	<?php cityaddedtillnow(); ?></a>
				    <a href="citytillnow.php" class="card-link btn btn-primary">Get Details</a>
				  </div>
				</div>
		</div>

<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Number of Areas Added Till Now </p>
				    <a href="#" class="card-link btn btn-warning">	<?php areraaddedtillnow(); ?></a>
				    <a href="areatillnow.php" class="card-link btn btn-primary">Get Details</a>
				  </div>
				</div>
		</div>
		
		<div class="col-sm-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-body">
				    <p class="card-text">Total Number of Login Till Now </p>
		
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	    <a href="#" class="card-link btn btn-warning">	<?php noofuser(); ?></a>
				    
				  </div>
				</div>
		</div>
</div>
		<br>
		<div class="row">
		<div class="col-sm-4">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <p class="card-text">No. Of Ratings
And Comment To Hoster Till Now </p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
    <a href="#" class="card-link btn btn-warning">	<?php noofratingtohoster(); ?></a>

			  </div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="card" style="width: 18rem;">
			  <div class="card-body">
			    <p class="card-text">No. Of Ratings
						And Comment To Player Till Now</p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	    <a href="#" class="card-link btn btn-warning">	<?php noofratingtoplayer(); ?></a>

			  </div>
			</div>
		</div>
<br>

	</div>

	</div>

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

