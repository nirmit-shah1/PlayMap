<?php
	session_start();
	include_once("..\connection.php");
	if(isset($_SESSION['adminusername']))
	{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>City Registration</title>
	</head>
	<body>
	<?php
		if(isset($_POST['btn_submit']))
		{
			$state1=$_POST['drp_state'];
			$city1=$_POST['txt_city'];
			$_SESSION['cityname']=$city1;		
			$check="0";
			if(!($state1==$check))
			{
				$_SESSION['drpstate']=$state1;			
			}
			if(!($state1==$check) && !($city1==NULL))
			{
					unset($_SESSION['cityname']);	
					unset($_SESSION['drpstate']);	
					$result=mysqli_query($con,"select max(cid) as cid1 from city");
					if($data=mysqli_fetch_array($result))
					{
						$no = $data['cid1'];
						$no=$no+1;
					}
					else
					{
						$no=1;
					}
					$result1=mysqli_query($con,"select * from state where sid='"."$state1'");
					if($data1=mysqli_fetch_array($result1))
					{
						$sid1=$data1['sid'];
					}
					$result2=mysqli_query($con,"insert into city values('$no','$sid1','$city1')");		
					echo"gaw";
					if($result2)
						header("location:city.php");
			}
			else
			{	if($state1==$check)
				{
					$_SESSION['stateerror']=0;
					header("location:city.php");		
				}
				if($city1==NULL)
				{
					$_SESSION['cityerror']=0;
					header("location:city.php");
				}
			}
				
		}
		else
		{
			header("location:city.php");
		}
	?>
</body>
</html>
<?php
}
else
	header("location:index.php");
?>