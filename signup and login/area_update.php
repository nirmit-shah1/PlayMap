<?php
	ob_start(); 
	session_start();
	include_once("toptemplate3.php");
	include_once("hmenu3.php");
	include_once("../connection.php");
if(isset($_SESSION['adminusername']))
{
	?>
	<form action="" method="post">
	<?php
		if(isset($_SESSION['aid']))
	{
		$aid=$_SESSION['aid'];
		$area_name=$_SESSION['area_name'];
	}
	else
	{
		$aid =$_GET['aid'];
		$area_name=$_GET['name'];
		$_SESSION['aid']=$_GET['aid'];
		$_SESSION['area_name']=$_GET['name'];
	}
 		//echo $aid;
		?>
<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update State</font>
			</h1>
		<?php
		echo "<font size='+2'>You are going to update area name of following:-</font><br /><br /><br />";
		$result1=mysqli_query($con,"select * from area where aid='$aid'");
		if($data1=mysqli_fetch_array($result1))
		{
			$result2=mysqli_query($con,"select * from state where sid=".$data1['sid']."");
			if($data2=mysqli_fetch_array($result2))
			{	
				echo "<font size='+2'>State name is :-</font>";
				echo "<font size='+2'>".$data2['state_name']."</font><br /><br />";
			}
			$result3=mysqli_query($con,"select * from city where cid =".$data1['cid']."");
			if($data3=mysqli_fetch_array($result3))
			{	
				echo "<font size='+2'>City name is :-</font>";
				echo "<font size='+2'>".$data3['city_name']."</font><br />";
			}
		}
	?>
	<br /><br />
	<table width="426" height="128">
			<tr>
				<td width="216"><font size='+2'>Enter Area</font></td>
				<td width="198"><input type="text" class="text" name="txt_area" value="<?php echo $area_name; 
				?>" />
			  </td>
			</tr>
<tr>
		<td></td>
		<td>
<?php

			if(isset($_SESSION['area_error']))
			{
				echo "<font color='red'>Enter Area Name</font>";
				unset($_SESSION['area_error']);
			}
?>
</td>
</tr>
			<tr>
			<td></td>
			<td><br />
				<input style="margin-left:-1px;" type="submit" class="button-3" name="update" value="update" />
			</td>
			</tr>
	
	</table>
	<?php
		if(isset($_POST['update']))
		{
			if(!($_POST['txt_area']==NULL))
			{	
				$name=$_POST['txt_area'];
				$data=mysqli_query($con,"update area set area_name='$name' where aid=".$aid);
				if($data)
					header("location:area.php");
				else
					echo "Error in updating Details...";
			}
			else
			{
				$_SESSION['area_error']=1;
				header("location:area_update.php");
			}
		}
	?><br /><br /><br />
	<a href="area.php"><font color="#990000" size="+2"><-Back To Area Registration Page</font></a>
	</body>
	</html>
	<?php
		}
		else
			header("location:../index.html");
	
	?>