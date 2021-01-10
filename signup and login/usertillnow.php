<?php
session_start();
if(isset($_SESSION['adminusername']))
{

include_once("toptemplate3.php");
include_once("../connection.php");
include_once("hmenu3.php");

?>
<html>
<head>
	<style type="text/css">
		.pad{
			padding: 10%;
		}
	</style>
<link rel="stylesheet" type="text/css" href="../simple signup/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../simple signup/css/navi.css" media="screen" />
<title>Registered User Page</title>
</head>
<body>
<br>

<table class="table text-center pad">
<tr>
  <th width="170" scope="col" background="../simple signup/img/323a45-2880x1800.png" align="center" ><h5>Registration id </font></th>
  <th width="92" scope="col" background="../simple signup/img/323a45-2880x1800.png" align="center"><h5>First name</h5></th>
  <th width="90" align="center" scope="col" background="../simple signup/img/323a45-2880x1800.png"><h5>Last name</h5></th>
  <th width="77" align="center" scope="col" background="../simple signup/img/323a45-2880x1800.png"><h5>Contact no.</h5></th>
  <th width="66" align="center" scope="col" background="../simple signup/img/323a45-2880x1800.png"><h5>Gender</h5></th>
<th width="157" align="center" scope="col" background="../simple signup/img/323a45-2880x1800.png"><h5> Registration Date</h5></font></th>
<th width="342" style="color:#ffffff" scope="col" background="../simple signup/img/323a45-2880x1800.png">Details</h5></th>
</thead>
<tbody>

<?php
$sql=mysqli_query($con,"select * from signup_details ");
while($row=mysqli_fetch_array($sql))
{
echo"<tr>";
echo "<td align='center'  style='color:#0099FF'>".$row['reg_id']."</td>";
echo "<td align='center'  style='color:#0099FF'>".$row['fname']."</td>";
echo "<td align='center'  style='color:#0099FF'>".$row['lname']."</td>";
echo "<td align='center'  style='color:#0099FF'>".$row['gender']."</td>";
echo "<td align='center'  style='color:#0099FF'>".$row['date']."</td>";
echo "<td align='center'  style='color:#0099FF'><a class='btn btn-primary' href=usertillnowdetails.php?detailsid=".$row['reg_id'].">More Details </a></td></tr>";
echo"</tr>";
}
?> 
</table>
<a href="report1.php"><font color="#990000" size="+2"><-Back to Report Page</font></a>
</tbody>
</body>
</html>
<?php
}
else
	header("location:../index.html");
?>