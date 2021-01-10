<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		$info=$_POST['p1'];
		$type=$_POST['uinfo'];
		echo $info;
		echo $type;
		echo $reg_id;
		if(isset($_POST['b1']) || isset($_POST['b2']) || isset($_POST['b3'])|| isset($_POST['b4'])|| isset($_POST['b5']))
		{
			$sql=mysqli_query($con,"update privacy SET $type='$info' where reg_id='".$reg_id."'");	
			if($sql)
			{
				header("location:privacy.php");	
			}
		}
		
		else
			header("location:privacy.php");	
	}
	else
	{
		header("location:../index.php");
	}	
?>
