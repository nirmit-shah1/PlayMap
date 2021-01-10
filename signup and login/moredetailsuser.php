<title>Details Of user Games</title>
<?php
session_start();
if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
{

include_once("toptemplate1.php");
include_once("hmenu.php");
include_once("../connection.php");
$id=$_GET['gameid'];
?>
<html>


<?php
$result=mysqli_query($con,"select * from signup_details where reg_id='".$id."'");
$row=mysqli_fetch_array($result);
?>
<br>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; More Details Of User</font></h1>


<table width="1205" height="68" cellpadding="10px" >
<thead>  
<tr>
<th width="226" scope="col" background="../simple signup/img/323a45-2880x1800.png" >Source Location</th>
<th width="255" scope="col" background="../simple signup/img/323a45-2880x1800.png">Venue Location</th>
<th width="245" scope="col" background="../simple signup/img/323a45-2880x1800.png">Famous Landmark 1</th>
<th width="245" scope="col" background="../simple signup/img/323a45-2880x1800.png">Famous Landmarks 2</th>
<th width="231" scope="col" background="../simple signup/img/323a45-2880x1800.png">More details</th>
  </tr>
</thead>
<tbody>
                                                                                                                <?php 
$result1=mysqli_query($con,"select * from routedetails where reg_id='".$id."'");
while($row1=mysqli_fetch_array($result1))
{
echo "<tr>";
echo "<td align='center' style='color:#0099FF'>".$row1[2]."</td>";
echo "<td align='center' style='color:#0099FF'>".$row1[3]."</td>";
echo "<td align='center' style='color:#0099FF'>".$row1[4]."</td>";
echo "<td align='center' style='color:#0099FF'>".$row1[5]."</td>";
echo "<td align='center' style='color:#0099FF' ><a href=moredetailsofgameuser.php?routeid=".$row1['mid']."&gameid=".$row1['reg_id'].">More Details </a></td></tr>";
}

?>
       
</table>

</div>
</body>
</html>

<?php
}
else
	header("location:../index.php");
?>