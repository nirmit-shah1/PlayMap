<html>
<head>
<title>
Update Page
</title>
</head>
</html>
<?php
session_start();
if(isset($_SESSION['adminusername']))
{	
	include_once("toptemplate3.php");
	include_once("hmenu3.php");
	include_once("../connection.php");
	$iid=$_GET['id'];
	if(isset($_GET['id']))
		{
			$reg_id=$_GET['id'];
			$_SESSION['regid']=$_GET['id'];
		}
		else
		{
			$reg_id=$_GET['id'];
			$_SESSION['regid']=$_GET['id'];
		}
	
	$sql="select * from signup_details where reg_id='".$reg_id."'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		$sql1="select * from login where reg_id='".$reg_id."'";
		$result1=mysqli_query($con,$sql1);
		$row1=mysqli_fetch_array($result1);
		
	//$a=$_SESSION['reg_id'];
	?>
	<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<title>Update Page</title>
	</head>
	<body style=" background-image:url(img1/tandc.jpg);background-repeat:no-repeat;background-size:cover;">

	<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;"> <font color="#000000">&nbsp;&nbsp; Information of User</font>
			</h1>
		
	<form action="basicupdateback.php?id=<?php echo $iid;?>" method="POST"" method="post">
		<table style="margin-bottom:80px;" width="578" height="442">
		<tr>
			<td  align="center"> First name:</td>
			<td align="center"><input type="text" class="text" name="txtfname" value="<?php if(!isset($_SESSION['fnameerror'])){echo $row[1]; unset($_SESSION['fnameerror']);}?>"></td>	</tr>
			<?php
				if(isset($_SESSION['fnameerror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter first name</font></td></tr>";
				unset($_SESSION['fnameerror']); 
				
				 }
					 
				?>
	<?php /*		if(isset($_SESSION['fnamevalue'])) 
			{echo $_SESSION['fnamevalue'];unset($_SESSION['fnamevalue']);}else{echo $row[1];}
			?>">
			</td></tr>
			
				<?php
				if(isset($_SESSION['fnameerror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter First name</font></td></tr>";
				unset($_SESSION['fnameerror']);
				 }
					 */
				?>
			
		
		<tr>
			<td align="center">Last name:</td>
			<td align="center"><input type="text" class="text" name="txtlname" value="<?php if(!isset($_SESSION['lnameerror'])){echo $row[2]; unset($_SESSION['lnameerror']);}?>"></td>	</tr>
			<?php
				if(isset($_SESSION['lnameerror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter Last name</font></td></tr>";
				unset($_SESSION['lnameerror']); 
				
				 }
					 
				?>
		<tr>
			<td align="center">Contact no:</td>
			<td align="center"><input type="text" class="text" name="txtcontact" value="<?php if(!isset($_SESSION['contacterror'])){echo $row[4]; unset($_SESSION['contacterror']);}?>"> </td></tr>
			<?php
				if(isset($_SESSION['contacterror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter Contact number</font></td></tr>";
				unset($_SESSION['contacterror']);
				 }
					 
				?>
		<tr>
			<td align="center">Email-Id:</td>
			<td align="center"><input type="text" class="text" name="txtemail" value="<?php if(!isset($_SESSION['emailerror'])){echo $row1[1]; unset($_SESSION['emailerror']);}?>"> </td></tr>
			<?php
				if(isset($_SESSION['emailerror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter Email Id number</font></td></tr>";
				unset($_SESSION['emailerror']);
				 }
					 
				?>
		<tr>
			<td align="center">Password:</td>
			<td align="center"><input type="text" class="text" name="txtpass" value="<?php if(!isset($_SESSION['passerror'])){echo $row1[2]; unset($_SESSION['passerror']);}?> "> </td></tr>
			<?php
				if(isset($_SESSION['passerror']))
				{
			
				echo "<tr><td></td><td ><font color='#FF0000'>&nbsp;&nbsp;&nbsp;Enter Password</font></td></tr>";
				unset($_SESSION['passerror']);
				 }
					 
				?>
		<tr>
			<td align="center" colspan="2"><input type="submit" class="button-3" value="update" name="submit"></td>
		</tr>
		</table>
	</form>

		<a href="admin.php"><font color="#330000" size="+2"><-Back To Admin Page</font></a>
			</div>
	</body>
	</html>
<?php
}
else
	header("location:../index.php");
?>