<html>
<head>
<title>Admin</title>
</head>
</html>
<?php
		session_start();
if(isset($_SESSION['adminusername']))
{	
		include("toptemplate3.php");
		include("hmenu3.php");
		include("../connection.php");
		
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<style>
			.update{
				color:green;
			}
			.delete{
				color:red;
			}
			.table-responsive {
 				   display: table;
				}
	</style>

	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;"> <font color="#000000">&nbsp;&nbsp; Additional details</font>
			</h1>
			 <div class="container-fluid">
<p style="background-image:url(img/323a45-2880x1800.png);"><font color="#FFFFFF" size="+3">All User Information</font>
					</p>				<?php
				include_once("../connection.php");
				$sql="select * from signup_details order by reg_id desc";
				$result=mysqli_query($con,$sql); 
				?>
				<table class='table'>
					<thead>
						<tr>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png">Srno.</th>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png">First name</th>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png">Last name</th>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png">Contact no.</th>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png">Gender</th>
							<th scope="col" background="../simple signup/img/323a45-2880x1800.png" style="width: 65px;">Email-id</th>
<th scope="col" background="../simple signup/img/323a45-2880x1800.png" style="width: 65px;">Password</th>
<th scope="col" background="../simple signup/img/323a45-2880x1800.png" style="width: 65px;">Update</th>
<th scope="col" background="../simple signup/img/323a45-2880x1800.png" style="width: 65px;">Delete</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
								$Srno=1;
								while($row=mysqli_fetch_array($result))
								{
								
				$sql1="select * from login where reg_id=$row[0]";
				$result1=mysqli_query($con,$sql1);
								$row1=mysqli_fetch_array($result1);
								echo "<tr >";
								echo "<td>".$Srno."</td>";
								//echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."</td>";
								echo "<td>".$row[4]."</td>";
								//echo "<td>".$row[5]."</td>";
								echo "<td>".$row1[1]."</td>";
								echo "<td>".$row1[2]."</td>";
		echo '<td><a class="update"   
		href="basicupdate.php?id="'.$row[0].'">Update</a></td>';
		
		echo '<td><a class="table-icon delete" onclick="return confirm(\'Are you sure you want to delete?\');"  
		href="basicdelete.php?did="'.$row[0].'">Delete</a></td>';
								echo "</tr>";
								$Srno++;
								}


						?>
</tbody></table></div></div>		</div>	
	</div>
</div>

</body>
</html>
<?php
}
else
header("location:../index.php");
?>
	

