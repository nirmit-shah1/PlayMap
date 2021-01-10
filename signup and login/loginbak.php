<html >
<head>
</head>
<body>
<?php
		session_start();
		include_once("toptemplate.php");
		include_once("connection.php");
		if($_POST['txt_loginid']==NULL)
		{
			$_SESSION['usernamenullerror']=1;
			header("location:homepage.php");
		}
		else
		{
			$uid=$_POST['txt_loginid'];
			
		}
		if($_POST['txt_password']==NULL)
		{
			$_SESSION['passwordnullerror']=1;
			header("location:homepage.php");
		}
		else
		{
			$password=$_POST['txt_password'];
		}
		if(isset($_POST['btn_login']))
		{
			if(($uid=="admin" || $uid=="ADMIN") && $password=="123")
			{
				$_SESSION['adminusername']="admin";
				header("location:admin/admin.php");
			}
			else
			{
				$query=mysqli_query($con,"select * from login where email='$uid'");
				if($data=mysqli_fetch_array($query))
				{
					if($password==$data['password'])
					{
						$_SESSION['email']=$data['email'];
						$_SESSION['emailcommanusername']=$data['email'];
						$_SESSION['reg_id']=$data['reg_id'];
						$reg_id=$_SESSION['reg_id'];
						$query22=mysqli_query($con,"select * from user_type where reg_id='".$reg_id."'");
						$data22=mysqli_fetch_array($query22);
						$type=$data22[1];
						if($type == "jobseeker")
						header("location:jobseeker/employee_resume.php");
						else
						header("location:../signup/employer_main.php");
						
						
					}
						
				
					else
					{
						$_SESSION['loginerror']=1;
						header("location:homepage.php");
					}
				}
				else
				{
					$_SESSION['loginerror']=1;
					header("location:homepage.php");
				}
			}
		}
	?>
</body>
</html>