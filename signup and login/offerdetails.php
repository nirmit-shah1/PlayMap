<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;About Game</font>
			</h1>
<?php
	if(isset($_POST['btn_all']))
{
	?>

	<?php
	$query1=mysqli_query($con,"select  * from routedetails where reg_id=$reg_id order by mid desc");
				while($data1=mysqli_fetch_array($query1))
				{
				?>
				<table class="trip" cellpadding="15">
	<tr>
		<td width="100">Your Location:</td>
		<td width="281">

	<?php
					echo $data1['source'];
	?>
	</td>
		<td width="119"></td>
	</tr>
	<tr>
		<td>Game Venue:</td>
		<td>
			<?php
				echo $data1['destination'];		
			?>
		</td><td></td>
	</tr>
	<tr>
		<td>Game date:</td>
		<td>
			<?php
				$query2=mysqli_query($con,"select * from typeofgame where mid='".$data1['mid']."'");
				if($data2=mysqli_fetch_array($query2))
				{
					  	$date=$data2['gamedate'];
						$m=substr($date,5,2);
						$d=substr($date,8,2);
						$y=substr($date,0,4);
						echo $d,"/",$m,"/",$y;
						$time=$data2['gametime'];
						echo ' '.$time;
				}
			?>
		</td><td></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
				$query3=mysqli_query($con,"select * from membergamingdetails where mid='".$data1['mid']."'");
				if($data3=mysqli_fetch_array($query3))
				{	?>
						Experience of Game:
					<?php
					echo $data3['exp'];		
					?>
					</td>
	</tr>
	<tr>
	<td colspan="3">
					<?php
					echo "Wait:"." ".$data3['wait'];
					?>
		</td>
		</tr>
		<tr><td colspan="2">
					<?php
						echo $data3['delay'];
				?>
			</td>
			<td title="Update game details">
			<?php
				echo "<a class='btn btn-warning	' href=offeredit.php?mid=".$data3['mid']."&rid=".$data2['rid'].">Edit</a>";
				$_SESSION['check']=1;
			?>
			</td>
		</tr>
				<?php
				}?>
</table><br />
	<?php
	}

}
else
{
?>
<?php
$query=mysqli_query($con,"select * from routedetails where reg_id=$reg_id");
if(mysqli_num_rows($query)>0)
{
?>
<table class="table">
	<tr>
		<td width="100">your point:</td>
		<td width="281">
			<?php 
				$query=mysqli_query($con,"select  max(mid) as mid1 from routedetails where reg_id=$reg_id");
				if($data=mysqli_fetch_array($query))
				{
					$query1=mysqli_query($con,"select * from routedetails where mid='".$data['mid1']."'");
					if($data1=mysqli_fetch_array($query1))
					{
					echo $data1['source'];
				
			?>		</td>
		<td width="119"></td>
	</tr>
	<tr>
		<td>View point:</td>
		<td>
			<?php
				echo $data1['destination'];
					}
			?>
		</td><td></td>
	</tr>
	<tr>
		<td>Game date:</td>
		<td>
			<?php
				$query2=mysqli_query($con,"select * from typeofgame where mid='".$data['mid1']."'");
				if($data2=mysqli_fetch_array($query2))
				{
					  	$date=$data2['gamedate'];
						$m=substr($date,5,2);
						$d=substr($date,8,2);
						$y=substr($date,0,4);
						echo $d,"/",$m,"/",$y;
						$time=$data2['gametime'];
						echo ' '.$time;
				}
			?>
		</td><td></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
				$query3=mysqli_query($con,"select * from membergamingdetails where mid='".$data['mid1']."'");
				if($data3=mysqli_fetch_array($query3))
				{	?>
						Experience of Game:
					<?php
					echo $data3['exp'];
					?>
					</td>
	</tr>
	<tr>
	<td colspan="3">
					<?php
					echo  "Wait:"." ".$data3['wait'];
					?>
		</td>
		</tr>
		<tr><td colspan="3">
					<?php
						echo $data3['delay'];
				}
			?>
		</td>
	</tr>
</table>
<br>
<form action="" method="post">
	&nbsp;&nbsp;&nbsp;<input class="btn btn-warning" type="submit" name="btn_all" value="Click To view all games" />
</form>
<br>
<?php
			}
			}
			else
				echo "You don't have any games offers";	
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