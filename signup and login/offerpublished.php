<?php
	session_start();
	$reg_id=$_SESSION['reg_id'];	
	$email=$_SESSION['emailcommanusername'];

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
	<br />
<br />
<?php
	if(isset($_SESSION['updatesuccess']))
	{
		?>
			<img src="success.jpg" height="30px" width="30px" /><b>Congratulations! Your game has been updated</b>    <a href="offerdetails.php" ><font color="#009900"><b><u>View your game hosted</u></b></font></a>
		<?php
	}
	else
	{
?>
	<img src="success.jpg" height="30px" width="30px" /><b>Congratulations! Your game has been published</b>    <a href="offerdetails.php" ><font color="#009900"><b><u>View your game hosted</b></u></font></a>
	<?php
		}
	?>
	</div>
	</body>
</html>
<?php
	}
	else
	{
		header("location:../hello.php");		
	}

?>