<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");
include_once("toptemplate3.php");
include_once("hmenu3.php");
if(isset($_SESSION['adminusername']))
{
	if(isset($_SESSION['aid']))
	{	
		unset($_SESSION['aid']);
		unset($_SESSION['area_name']);
	}
?>
<html>
	<head>
	<title>Area registrstion</title>
	<script language="javascript" type="text/javascript">
	function showCity(str)
{
if (str=="")
  {
  document.getElementById("drpcity").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("drpcity").innerHTML=xmlhttp.responseText;
    }
  }
  
xmlhttp.open("GET","city_detail.php?q="+str,true);
xmlhttp.send();
}
</script>

	</head>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" ></head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Add Area</font>
			</h1>
	

<form action="area_back.php" method="post">
<table width="653" height="312">
	<tr>
    <td width="99"><font size="+3">State</td>
    <td width="204"><select class="text" name="drpstate" onChange="showCity(this.value)">
	<option value="0">--select--</option>
	<?php
		$sql=mysqli_query($con,"select * from state");
		while($row=mysqli_fetch_array($sql))
		{
			?>
				<option value="<?php echo $row['sid'];?>"><?php echo $row['state_name'];?></option>
				<?php
		}
	?>
	</select>	
	  </td>
  </tr>
		<tr>
			<td></td>
			<td>
			<?php
				if(isset($_SESSION['error_sid']))
				{
					echo "<font color='red'>select state</font>";
					unset($_SESSION['error_sid']);
				}
			?>
		</td>
		</tr>
			 <tr>
		<td><font size="+3">city</font></td>
		<td><div id="drpcity"></div></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<?php
				if(isset($_SESSION['error_cid']))
				{
					echo "<font color='red'>select city</font>";;
					unset($_SESSION['error_cid']);
				}
			?>
		</td>
		</tr>
		<tr>
			<td><font size="+2">Enter area</font></td>
			<td><input type="text" name="txt_area" class="text" value="<?php 
			if(isset($_SESSION['value_area_name'])){echo $_SESSION['value_area_name'];
				unset($_SESSION['value_area_name']);}?>"/></td>
		
		</tr>
		<tr>
		<td></td>
			<td>
			<?php
				if(isset($_SESSION['error_area_name']))
				{
					echo "<font color='red'>Enter area name</font>";
					unset($_SESSION['error_area_name']);
				}
			?>
			</td>
		</tr>
		<tr>
		<td>
		</td>
		<td><input class="button-3" style="margin-left:0px;" type="submit" name="btn_insert" value="insert" /></td>
		</tr>
</table><br /><br />
<table width="925" height="87" border="1">
	<tr>
		<th align="center"bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">State name</th>
		<th align="center" bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">City name</th>
		<th align="center" bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">Area name</th>
		<th align="center" bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">Update</th>
		<th align="center" bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">Delete</th>
	</tr>
	<?php
			$result=mysqli_query($con,"select * from area");
			while($data=mysqli_fetch_array($result))
			{
	?>
	<tr>
		<td align="center">
		<?php
				$result2=mysqli_query($con,"select * from state where sid=".$data['sid']." ");
				if($data1=mysqli_fetch_array($result2))
				{
					echo $data1['state_name'];
				} 
		?>
		</td>
		<td align="center">
			<?php 	

					
					$result2=mysqli_query($con,"select * from city where cid='".$data['cid']."'");
					
					if($data1=mysqli_fetch_array($result2))

					{
						echo $data1['city_name'];
					} 
			?>
		</td>
		<td align="center">
			<?php
				echo $data['area_name'];	
			?>
		</td>
		<td align="center">
			<?php
				echo "<a href=area_update.php?aid=".$data['aid']."&name=".$data['area_name']."><font color='#660099'>Update</font></a>";
			?>
		</td>
		<td align="center">
			<?php
				echo "<a href=area_delete.php?aid=".$data['aid']."><font color='#660099'>Delete</font></a>";
			?>
	</tr>
	<?php
		}
	?>
</table>
<p>&nbsp;</p>
<a href="admin.php"><font color="#990000" size="+2"><-Back To Admin Registration Page</font></a>

  </body>
  <?php
}
else
	header("location:../index.html");
?>
</p>
</body>
</html>