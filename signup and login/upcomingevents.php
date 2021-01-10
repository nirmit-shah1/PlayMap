<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		$error=0;	
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<style>
	.hrc{
		border:2px solid yellow;
	}
	</style>
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Upcoming Events</font></h1>
			<?php
					$sql0=mysqli_query($con,"select * from booking where reg_id= '".$reg_id."'");
					
					while($final1=mysqli_fetch_array($sql0))
					{
						 $hid=$final1['hid'];
						 $gid=$final1['gid'];
						 $gdate=$final1['gdate'];
						 $cdate=date('Y-m-d');
						 $gtime=$final1['gtime'];
						 
						 $pate=explode(" ",$gtime);
						 $ghrs=$pate[0];
						 $gmin=$pate[1];
						 $demo=0;
						 $final=0;
						 date_default_timezone_set('Asia/Kolkata');
						 $chrs=date('H');
						 $cmin=date('i');
    					 if($gdate > $cdate)
						 {
						 	$final=1;
							//echo"hello";
						 }
						 else if($gdate == $cdate)
						 {
						 	if($ghrs>$chrs)
								$demo=1;
							else if($ghrs == $chrs)
								$demo=2;
							if($demo == 1)
								$final=1;
							else if($demo == 2)
							{
								if($gmin>=$cmin)
									$final=1;
							}
						}
						else
						{
							$error=1;
						}
						if($final == 1)
						{
							//========================MAIN QUERY===============================================
								?><table style="margin-left:10px;" cellpadding="5px;"><?php
							$sql1=mysqli_query($con,"select * from routedetails where reg_id='".$hid."' AND mid='".$gid."'");
							$sql2=mysqli_query($con,"select * from membergamingdetails where reg_id='".$hid."' AND mid='".$gid."'");
							$sql3=mysqli_query($con,"select * from typeofgame where reg_id='".$hid."' AND mid='".$gid."'");
							$result=mysqli_query($con,"select * from signup_details where reg_id='".$hid."'");
							$row1=mysqli_fetch_array($result);
															$row3=mysqli_fetch_array($sql3);
								$row2=mysqli_fetch_array($sql2);							
			
							while($row=mysqli_fetch_array($sql1))
							{
															
								echo "<tr><td>Name Of Hoster:-</td>";
								echo"<td>".$row1[1];
								echo "&nbsp;".$row1[2]."</td>";
								echo "<tr><td>Contact No:-</td>";
								echo "<td>".$row1[3]."</td></tr>";
								echo "<tr><td>Venue location:-</td><td>".$row[3]."</td></tr>";	
								echo "<tr><td>Famous Landmark:-</td><td>".$row[4]."</td></tr>";	
								echo "<tr><td>Famous Landmark:-</td><td>".$row[5]."</td></tr>";	
								echo "<tr><td>Game Date:-</td><td>".$row3[3]."</td></tr>";	
								echo "<tr><td>Game Time:-</td><td>".$row3[4]."</td></tr>";
								echo "<tr><td>Price Per Player:-</td><td>".$row2[2]."</td></tr>";	
								echo "<tr><td>Players required:-</td><td>".$row2[3]."</td></tr>";
								echo "<tr><td>Experience in Game:-</td><td>".$row2[4]."</td></tr>";		
								echo "<tr><td>Will Wait:-</td><td>".$row2[5]."</td></tr>";	
								echo "<tr><td>Delay:-</td><td>".$row2[6]."</td></tr></table>";
								echo "<hr class='hrc'>";
							}
							
						}
						 
						 
						
					}
					
					if($error == 1)
					{
?>									&nbsp;&nbsp;&nbsp;&nbsp;<a href="demo2.php" style="float:left;"><img style="height:107px;" src="plus.jpeg"></a>
				<?php 
				echo "<font size='+4'>You don't have any game Scheduled</font>";	
				echo "<br><br><br><br>";
					}
			?>
	

</div>
</body>
</html>
<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>
