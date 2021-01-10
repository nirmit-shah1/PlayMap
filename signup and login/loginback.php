<html >
<head>
</head>
<body>
<?php
		session_start();
		include_once("../connection.php");
		$_SESSION['userdirection']=$_GET['uinfo'];
		$uinfo=$_GET['uinfo'];
		$str1="location:login.php?uinfo=".$uinfo;

		if($_POST['txt_loginid']==NULL)
		{
			$_SESSION['usernamenullerror']=1;
			header($str1);
			
		}
		else
		{
		
			$uid=$_POST['txt_loginid'];
			
		}
		if($_POST['txt_password']==NULL)
		{
			$_SESSION['passwordnullerror']=1;
			header($str1);
		}
		else
		{
		
			$password=$_POST['txt_password'];
		}
		if(isset($_POST['btn_login']))
		{
		echo "hello";
			if(($uid=="admin@gmail.com" || $uid=="ADMIN") && $password=="123456")
			{
				$_SESSION['adminusername']="admin";
				header("location:admin.php");
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
						echo $uinfo;
						if($uinfo == 1)
						header("location:demo1.php");
						else
						header("location:demo2.php");
						
						
					}
						
				
					else
					{
						$_SESSION['loginerror']=1;
						header($str1);
					}
				}
				else
				{
					$_SESSION['loginerror']=1;
					header($str1);
				}
			}
		}
	?>
</body>
</html>