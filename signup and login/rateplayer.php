<html>
<head>
<title>
Rating
</title>
</head>
</html>
<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
		$count=0;
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Rate Game Player</font></h1>
			<?php
//=====================================================MAIN CODE=========================================
				$sql0=mysqli_query($con,"select * from booking where hid='".$reg_id."'");
					while($final1=mysqli_fetch_array($sql0))
					{ 
						
						 $pid=$final1['reg_id'];
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
    					 if($gdate < $cdate)
						 {
						 	$final=1;
							
						 }
						 else if($gdate == $cdate)
						 {
						 	if($ghrs<$chrs)
								$demo=1;
							else if($ghrs == $chrs)
								$demo=2;
							if($demo == 1)
								$final=1;
							else if($demo == 2)
							{
								if($gmin<=$cmin)
									$final=1;
							}
						}
						else if ($gdate > $cdate)
						{	
								$count++;
						}
						if($final == 1)
						{
							$sql1=mysqli_query($con,"select * from signup_details where reg_id='".$pid."'");
							$row1=mysqli_fetch_array($sql1);
							?>
							<h1 style="color: #FF6600; font-size:38px; padding-left: 31px;">
							<?php echo "$row1[1] $row1[2]";?></h1>
							<br>
							<h2 style="color: #0066CC; font-size:18px;">
							<?php	
								echo "<a style='color: #0066CC; padding-left: 31px;' href='ratingplayerdetails.php?playerid=".$pid."'>Rate And Comment $row1[1] $row1[2]</a>"?></h2>			
	<?php
	
						}
						
					}
					if($count>0)
					{
						
							?>			&nbsp;&nbsp;&nbsp;&nbsp;<a href="demo2.php" style="float:left;"><img style="height:107px;" src="plus.jpeg"></a>
				<?php 
				echo "<font size='+4'>First You have to play with any game hoster then only you can rate any hoster.</font>";
				echo"<br>";
				echo"<br>";
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
