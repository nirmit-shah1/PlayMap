<?php
session_start();
if(isset($_SESSION['adminusername']))
{	
	include_once("..\connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>game delete</title>
</head>
<body>
<?php
	$gid1=$_GET['id'];
	$query=mysqli_query($con,"delete from game where gid='".$gid1."'");
	if($query)
	{
		header("location:game.php");
	}
?>
</body>
</html>
<?php
}
else
	header("location:../index.php");
?>