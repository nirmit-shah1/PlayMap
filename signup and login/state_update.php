<html>
<head>
<title>State</title>
<link href="style-box.css" rel="stylesheet" type="text/css" >

</head>
</html>
<?php
ob_start(); 
session_start();
if(isset($_SESSION['adminusername']))
{	
	include_once("toptemplate3.php");
	include_once("hmenu3.php");
	include_once("../connection.php");

	if(isset($_SESSION['sid1']))
	{
		$sid1=$_SESSION['sid1'];
		$sql=mysqli_query($con,"select * from state where sid=".$sid1." ");
		$row=mysqli_fetch_array($sql);
	}
	else
	{
		$sid1=$_GET['id'];
		$_SESSION['sid1']=$_GET['id'];
		$sql=mysqli_query($con,"select * from state where sid=".$sid1." ");
		$row=mysqli_fetch_array($sql);
	}
?>
<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update State</font>
			</h1>


<form action="" method="post">
<table width="645" height="213" cellspacing="20">
	<tr>
		<td><font size="+3">Enter State Name </font></td>
		<td><input class="text" type="text" name="txt_state" value="<?php echo $row['state_name']; ?>" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
<?php

			if(isset($_SESSION['state_error']))
			{
				echo "<font color='red'>please enter proper state</font>";
				unset($_SESSION['state_error']);
			}
?>
</td>
</tr>
</table><br />
<br />
<br />

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" style="margin-top:-110px; margin-left:160px;" class="btn btn-success" name="update_btn_submit" value="update" />
</form>
	<br />
<?php
	if(isset($_POST["update_btn_submit"]))
	{
		$statename=$_POST['txt_state'];
		if(!($_POST['txt_state']==NULL))
		{
			$query=mysqli_query($con,"update state set state_name='$statename' where sid=".$sid1);
			unset($_SESSION['state']);
			unset($_SESSION['sid1']);
			header("location:stateback.php");
		}
		else
		{
			$_SESSION['state_error']=1;
			header("location:state_update.php?id=4");
		}
	}
?>
<br><br>
<a href="state.php"><font color="#990000" size="+2"><-Back to state registration</font></a>
</body>
</div>
</html>
<?php
}
else
{
	header("location:../index.php");
}
?>