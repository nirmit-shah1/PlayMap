<?php
session_start();
if(isset($_SESSION['adminusername']))
{	 
	 include_once("..\connection.php");	 
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alter game</title>
</head>
<body><br />
<br />
<?php
		if(isset($_POST["btn_submit"]))
		{
				
		 $gamename=$_POST['txt_game'];
		 if($gamename==NULL)
		 {
			$_SESSION['game']=0;
			header("location:game.php");
		 }
		 else
		 {
			$result1=mysqli_query($con,"select max(gid) as gid1 from game");
			//checks last raecords student id
			if($row=mysqli_fetch_array($result1))
			{
				$no = $row['gid1'];
				$no=$no+1;
			}
			else
			{
				$no=1;
			}
			$insertquery=mysqli_query($con,"insert into game values('$no','$gamename')");
			if($insertquery)
				header("location:game.php");
		}
		}
		else
		{ 
			header("location:game.php");
		}
	
	?>
</table><br />
<br />
<a href="game.php">Go To game registration page</a>
</body>
</html>
<?php
}
else
	header("location:../index.php");
?>