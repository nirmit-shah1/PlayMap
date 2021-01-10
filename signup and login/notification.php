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
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Notifications</font>
			</h1>
			
			<br />
			<?php
				$_SESSION['notification_page']=1;
				if(isset($_SESSION['notification_page']))
				{
					$query=mysqli_query($con,"select * from friend_request where rid='".$reg_id."' AND status='pending' ");
					while($info=mysqli_fetch_array($query))
					{
					$id=$info[1];
					$_SESSION['senderid']=$id;
					$query1=mysqli_query($con,"select * from alias where reg_id='".$id."'");
					$info1=mysqli_fetch_array($query1);
					if (!$info1) {
						    printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
				echo "<ul><li><font size='+3' color='#FF6600'>&nbsp;&nbsp;&nbsp;You recieved a friend request from </font><a href='addfriend.php'><font size='+3' color='#0099FF'>".$info1['alias_name']."</font></a></li></ul><br>";  
					}
				}

				$_SESSION['notification_page']=1;
				if(isset($_SESSION['notification_page']))
				{
					$query0=mysqli_query($con,"select * from booking where reg_id='".$reg_id."'");
					while($info0=mysqli_fetch_array($query0))
					{

						$hid=$info0[1];
						$gid=$info0[2];
						$query11=mysqli_query($con,"select * from alias where reg_id='".$hid."'");
						$info11=mysqli_fetch_array($query11);
						if (!$info11) {
						    printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
						$_SESSION['alias']=$hid;
						$_SESSION['notify']=1;
				echo "<ul><li><font size='+3' color='#FF6600'>&nbsp;&nbsp;&nbsp;You book a game posted by  </font><a href='viewprofile1.php?aliasid=$hid'><font size='+3' color='#0099FF'>".$info11['alias_name']."</font></a></li></ul><br>";  
					}
				}
//===========================================================HOSTER SIDE=========================================
								$_SESSION['notification_page']=1;
				if(isset($_SESSION['notification_page']))
				{
					$query0=mysqli_query($con,"select * from booking where hid='".$reg_id."'");
					while($info0=mysqli_fetch_array($query0))
					{

						$pid=$info0[0];
						$query11=mysqli_query($con,"select * from alias where reg_id='".$pid."'");
						$info11=mysqli_fetch_array($query11);
						if (!$info11) {
						    printf("Error: %s\n", mysqli_error($con));
    					exit();
						}
						$_SESSION['alias']=$pid;
						$_SESSION['notify']=1;
				echo "<ul><li><font size='+3' color='#FF6600'>&nbsp;&nbsp;&nbsp;You got a player for your game </font><a href='viewprofile1.php?aliasid=$pid'><font size='+3' color='#0099FF'>".$info11['alias_name']."</font></a></li></ul><br>";  
					}
				}

			?>
<br /><br />
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
<? ob_start(); ?>