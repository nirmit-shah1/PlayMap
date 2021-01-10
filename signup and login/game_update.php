<html>
<head>
<title>Game</title>
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

	if(isset($_SESSION['gid1']))
	{
		$gid1=$_SESSION['gid1'];
		$sql=mysqli_query($con,"select * from game where gid=".$gid1." ");
		$row=mysqli_fetch_array($sql);
	}
	else
	{
		$gid1=$_GET['id'];
		$_SESSION['gid1']=$_GET['id'];
		$sql=mysqli_query($con,"select * from game where gid=".$gid1." ");
		$row=mysqli_fetch_array($sql);
	}
?>
<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update game</font>
			</h1>


<form action="" method="post">
<table width="645" height="213" cellspacing="20">
	<tr>
		<td><font size="+3">Enter game Name </font></td>
		<td><input class="text" type="text" name="txt_game" value="<?php echo $row['game_name']; ?>" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
<?php

			if(isset($_SESSION['game_error']))
			{
				echo "<font color='red'>please enter proper game</font>";
				unset($_SESSION['game_error']);
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
		$gamename=$_POST['txt_game'];
		if(!($_POST['txt_game']==NULL))
		{
			$query=mysqli_query($con,"update game set game_name='$gamename' where gid=".$gid1);
			unset($_SESSION['game']);
			unset($_SESSION['gid1']);
			header("location:gameback.php");
		}
		else
		{
			$_SESSION['game_error']=1;
			header("location:game_update.php?id=4");
		}
	}
?>
<br><br>
<a href="game.php"><font color="#990000" size="+2"><-Back to game registration</font></a>
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