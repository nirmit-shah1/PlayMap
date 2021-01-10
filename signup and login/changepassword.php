<?php
ob_start();
session_start();
include_once("toptemplate3.php");
include_once("hmenu1.php");
include_once("../connection.php");
$uinfo=$_GET["uinfo"];
$str="location:forgetsecuritycheck.php?uinfo=".$uinfo;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change password</title>
</head>

<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Change Password</font>
			</h1>
<?php

	if(isset($_POST['btn_submit']))
	{
		if(!($_POST['txt_password']==null))
		{
			$pass=$_POST['txt_password'];
		}
		else
		{
			$_SESSION['sessionerror']=1;
			$_SESSION['txt_passworderror']=1;
			header($str);			
		}
		
		if(!($_POST['txt_cpassword']==null))
		{
			$cpass=$_POST['txt_cpassword'];
		}
		else
		{
			$_SESSION['sessionerror']=1;
			$_SESSION['txt_cpassworderror']=1;
			header($str);			
		}
		if(!($_POST['txt_password']==NULL || $_POST['txt_cpassword']==NULL))
		{
			if($pass==$cpass)
			{
				$reg_id=$_SESSION['reg_id'];
				unset($_SESSION['sessionerror']);						
				$query=mysqli_query($con,"update login set password=$pass where reg_id=$reg_id");
				if($query)
				{
					$query1=mysqli_query($con,"select * from login where reg_id=$reg_id");
					$data=mysql_fetch_array($query1);
					$_SESSION['email']=$data['email'];
						$_SESSION['emailcommanusername']=$data['email'];
						$_SESSION['reg_id']=$reg_id;
						$str1="location:login.php?uinfo=".$uinfo;
					header($str1);
				}
			}
			else
			{
				$_SESSION['sessionerror']=1;
				$_SESSION['cmperror']=1;
				header($str);
			}
		}
		else
		{
			header($str);
		}
	}
	
?>
</div>
</body>
</html>
