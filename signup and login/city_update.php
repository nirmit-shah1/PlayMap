
<html>


<head>
<title>City</title>
<link href="style-box.css" rel="stylesheet" type="text/css" >

</head>
</html>

<?php
ob_start();
	session_start();
	if(isset($_SESSION['adminusername']))
	{
		
		include("../connection.php");	
		include_once("toptemplate3.php");
		include_once("hmenu3.php");
				
		
			
	if(isset($_SESSION['cid']))
	{
		$cid=$_SESSION['cid'];
		$cityname=$_SESSION['cityname'];
	}
	else
	{
		$cid =$_GET['id'];
		$cityname=$_GET['nm'];
		$_SESSION['cid']=$_GET['id'];
		$_SESSION['cityname']=$_GET['nm'];
	}
	?>
	<html>
	<head>
		<title>Update City name</title>
	</head>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update City</font>
			</h1>





	<form action="" method="post"><br />
	<table width="477" height="183" >
	<TR	>
		<td><font size="+3">Enter city</font></td>
		<td><input class="text" type="text" name="txt_cityname" value="<?php echo $cityname;?>" /></td>
	</TR>
	<tr>
		<td></td>
		<td>
<?php

			if(isset($_SESSION['city_error']))
			{
				echo "<font color='red'>Enter City Name</font>";
				unset($_SESSION['city_error']);
			}
?>
</td>
</tr>
	<tr>
		<td align="center" colspan="2"><input class="btn btn-success" type="submit" value="Update" name="btn_submit" /></td>
	</tr>
	</table>
	<?php
		if(isset($_POST['btn_submit']))
		{
			$newcity=$_POST['txt_cityname'];
			if(!($_POST['txt_cityname']==NULL))
			{
				echo $cid;
				$query=mysqli_query($con,"update city set city_name='$newcity' where cid=".$cid);
				if($query)
				{
					unset($_SESSION['cid']);
					unset($_SESSION['cityname']);
					header("location:city.php");
				}
				else
				{
					echo "<br>Error in updating data";
				}
			}
			else
			{
				$_SESSION['city_error']=1;
				header("location:city_update.php");
			}
		}
	?>
	</form>
	<a href="city.php"><font color="#990000" size="+2"><-Back To City Registration Page</font></a>
	</div>
	</body>
	</html>
<?php
}
else
	header("location:../index.html");
?>
