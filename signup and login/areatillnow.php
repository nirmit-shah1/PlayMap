<?php 
session_start();
if(isset($_SESSION['adminusername']))
{

include_once("toptemplate3.php");
include_once("hmenu3.php");

include_once("../connection.php");
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>

<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of City</font></h1>

	<div class="container">
<table class="table text-center">
	<tr>
	<td>Area id</td> 
<td>Area name</td>
<?php
$sql=mysqli_query($con,"select * from area ");
while($row=mysqli_fetch_array($sql))
{
echo"<tr>";
echo "<td style='color:#0099FF' align='center'>".$row['aid']."</td>";
echo "<td style='color:#0099FF' align='center'>".$row['area_name']."</td>";
echo"</tr>";
}
?></div>
</div>
</body>
</html>
<?php
}
else
	header("location:../index.html");
?>