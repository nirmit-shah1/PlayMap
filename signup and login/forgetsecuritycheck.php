<html>

	<head>
	<title>Change Password</title>
	<link href="style-box.css"  rel="stylesheet" type="text/css" >
	</head>
<?php
	session_start();	
	include_once("../toptemplate.php");

	include_once("../connection.php");
	$uinfo=$_GET["uinfo"];
$str="location:forgetpassword.php?uinfo=".$uinfo;

	
?>
<?php
if(isset($_POST['btn_submit']) || isset($_SESSION['sessionerror']))
{
		if(isset($_SESSION['sessionerror']))
		{
			$qid=$_SESSION['qid1'];
			$answer=$_SESSION['answer1'];
		}
		else
		{
			if(isset($_POST['securityquestion']))
			{
				$_SESSION['securityquestionvalue']=$_POST['securityquestion'];
				$qid=$_POST['securityquestion'];
				$_SESSION['qid1']=$qid;
			}
			if($_POST['answer']==NULL)
			{
					$_SESSION['answererror']=1;
					$_SESSION['check']=$_SESSION['email'];
					header($str);	
			}
			else
			{			
				unset($_SESSION['check']);
				$answer=$_POST['answer'];
				$_SESSION['answer1']=$answer;
			}
		}
		if(isset($_SESSION['reg_id']))
		{
			$reg_id=$_SESSION['reg_id'];
			$_SESSION['reg_id']=$reg_id;
			$query=mysqli_query($con,"select * from usersecurityanswer where reg_id ='".$reg_id."'");
			$data=mysqli_fetch_array($query);
			if($qid==$data[1] && $answer==$data[2])
			{
					include("hmenu1.php");
		 ?>
		 	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Change Password</font>
			</h1>
		
		<?php
				unset($_SESSION['check']);			
				$data1=mysqli_query($con,"select * from login where reg_id='".$reg_id."'");
				if($query1=mysqli_fetch_array($data1))	
				{
					//$_SESSION['reg_id']=$query1[0];
					//$_SESSION['email']=$txt_email;
					$data2=mysqli_query($con,"select * from signup_details where reg_id=$query1[0]");
					if($query2=mysqli_fetch_array($data2))
					{
				?>
					
						<form action="changepassword.php?uinfo=<?php echo $uinfo;?>" method="POST">
				<table> 
					<tr>
					<td>
						<?php
							 $data3=mysqli_query($con,"select * from images where reg_id=$query1[0]");
							 $query3=mysqli_fetch_array($data3);
						?>
						<img src="images/<?php echo $query3[1];?>" height="100" width="100"/>
					</td>
					<td >
						<?php echo $query2[1]." ".$query2[2]?>
						
					</td>
					</tr>
					<tr>	
						<td>Change Password</td>
						<td>
							<input type="password" name="txt_password" class="text">
						
						</td>
						</tr>
					<?php 
							if(isset($_SESSION['txt_passworderror']))
							{
									echo "<tr><td></td><td><font color=red>Enter password</font></td></tr>";					
									unset($_SESSION['txt_passworderror']);
							}							
					?>
						<tr>
						<td>
							Confirm Change Password
						</td>
						<td>
							<input type="password" name="txt_cpassword" class="text" />
						</td>
						</tr>
						<?php
							if(isset($_SESSION['txt_cpassworderror']))
							{
									echo "<tr><td></td><td><font color=red>Enter confirm password</font></td></tr>";					
									unset($_SESSION['txt_cpassworderror']);
							}
							if(isset($_SESSION['cmperror']))
							{
									echo "<tr><td></td><td><font color=red>password doesn't match</font></td></tr>";					
									unset($_SESSION['cmperror']);
							}							
					?><tr>
						<td></td>
						<td>
							<input style="margin-bottom:80px; margin-left:-10px;" type="submit" name="btn_submit" value="submit"  class="btn btn-success"/>
							</form>
	<?php
					}
				}
			}
			else
			{
				
				$_SESSION['check']=$_SESSION['email'];
				$_SESSION['invalidanswer']=1;
				header($str);
			}
	}
}
else
{
	header($str);
}
?>
			
</div>
		</body>
		</html>