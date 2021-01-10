<html>

	<head>
	<title>Forget Password</title>
	<link href="style-box.css"  rel="stylesheet" type="text/css" >
	</head>
<?php
session_start();
include_once("../connection.php");
include_once("../toptemplate.php");
if($_POST['txt_email']!=NULL || isset($_SESSION['answererror']))
include_once("hmenu1.php");
$uinfo=$_GET["uinfo"];
$str="location:forgetpassword.php?uinfo=".$uinfo;

?>

<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Forget Password</font>
			</h1>
			<?php
	if(isset($_POST['btn_search']) || isset($_SESSION['check']) )
	{
		if(isset($_SESSION['check']))
		{
			$txt_email=$_SESSION['check'];
		}
		else
		{
			if($_POST['txt_email']==NULL)
			{
				$_SESSION['txt_emailerror']=1;
                header($str);
			}
			else
			{
				$txt_email=$_POST['txt_email'];

			}
		}
				$data1=mysqli_query($con,"select * from login where email='".$txt_email."'");
				
	//			echo "select * from login where email=$txt_email";
				if($query1=mysqli_fetch_array($data1))	
				{
					$_SESSION['reg_id']=$query1[0];
					$_SESSION['email']=$txt_email;
					$data2=mysqli_query($con,"select * from signup_details where reg_id=$query1[0]");
					if($query2=mysqli_fetch_array($data2))
					{
				?>
					
						<form action="forgetsecuritycheck.php?uinfo=<?php echo $uinfo;?>" method="POST">
				<table > 
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
						<td>Select security question</td>
						<td>
							<select name="securityquestion" class="text">
					<?php
						$query=mysqli_query($con,"select * from securityquestion");
						while($data=mysqli_fetch_array($query))
						{
							if(isset($_SESSION['securityquestionvalue']))
							{
								if($_SESSION['securityquestionvalue']==$data[0])
								{
									echo "<option value=$data[0] selected=selected>$data[1]</option>";					
									unset($_SESSION['securityquestionvalue']);
								}
								else
								{
									echo "<option value=$data[0]>$data[1]</option>";					
								}
							}
							else
							{
								echo "<option value=$data[0]>$data[1]</option>";					
							}
						}
					?>
						</select>
						</td>
						</tr>
						<tr>
						<td>
							Answer
						</td>
						<td>
							<input type="text" name="answer" class="text" onKeyUp="this.value = this.value.replace(/[^a-z,A-Z]/g,'')" autocomplete="off"/>
						</td>
						</tr>
						<?php
							echo "<tr><td></td><td>";
							if(isset($_SESSION['answererror']))
							{
								unset($_SESSION['answererror']);
								echo "<font color=red>enter answer</font></td></tr>";
								if(isset($_SESSION['invalidanswer']))
								{
										unset($_SESSION['invalidanswer']);
								}
							}
							else
							{	
								if(isset($_SESSION['invalidanswer']))
								{
									echo "<tr><td></td><td>";
									unset($_SESSION['invalidanswer']);
									echo "<font color=red>Invalid answer</font></td></tr>";
								}
							}	
						?>
						<tr>
						<td></td>
							</table>
					<br>
							<input type="submit" name="btn_submit" value="submit"  class="btn btn-success"/>
							</form>
							<br>
	
							<form action="forgetpassword.php?uinfo=<?php echo $uinfo;?>" method="POST">
								<input type="submit" name="btn_submit" value="Not me" class="btn btn-warning">
							</form>
					
							
					<?php
	//			echo "<br>".$query2[1];
					}
				}
				else
				{
					echo "No profile found related to this Email-Id";
					 ?><br />
	<br />
	<img src="img1/symbol-error.png" height="256" width="256">
						&nbsp;&nbsp;&nbsp;&nbsp;<form action="forgetpassword.php?uinfo=<?php echo $uinfo;?>" method="POST" >
							<input type="submit" class="btn btn-warning" name="forget" value="Forget password" />
						</form>
						<form action="login.php?uinfo=<?php echo $uinfo;?>" method="POST">
							<input type="submit" name="login" class="btn btn-danger" value="Login" />
						</form>
						<br><?php
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