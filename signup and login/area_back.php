<?php
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
	session_start();
	include_once("../connection.php");
	if(isset($_SESSION['adminusername']))
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insert area</title>
</head>
<body>
<?php	
	if(isset($_POST['btn_insert']))
	{
		$check="0";
		if($_POST['drpstate']==$check)
		{
			$_SESSION['error_sid']=0;			
		}	
		else
		{
			$sid=$_POST['drpstate'];
			$_SESSION['value_sid']=$sid;
		}
		if($_POST['drpcity']==$check || $_POST['drpcity']==NULL)
		{
			$_SESSION['error_cid']=0;	
		}
		else 
			$cid=$_POST['drpcity'];
			
		if($_POST['txt_area']==NULL)
		{
			$_SESSION['error_area_name']=0;			
		}
		else 
		{
			$area_name=$_POST['txt_area'];
			$_SESSION['value_area_name']=$area_name;
		}
		if(isset($sid) && isset($cid) && isset($area_name))
		{	
				unset($_SESSION['value_sid']);
				unset($_SESSION['value_area_name']);
				$query=mysqli_query($con,"select max(aid) as aid1 from area");
					if($data=mysqli_fetch_array($query))
					{	
						$no = $data['aid1'];
						$no=$no+1;
					}
					else
					{
						$no=1;
					}
				echo $no.$sid.$cid.$area_name;
				$query1=mysqli_query($con,"insert into area values ('$no','$sid','$cid','$area_name')");
				if($query1)
					header("location:area.php");
				else
					echo "error in inserting";
		}
		else
		header("location:area.php");
	}
	else
		header("location:area.php");	
?>
<a href="area.php">Insert Area</a>
</body>
</html>
<?php
}
else
	header("location:../index.html");
?>