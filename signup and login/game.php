<?php
session_start();
if(isset($_SESSION['adminusername']))
{
	include_once("../connection.php");
	include_once("toptemplate3.php");
		include_once("hmenu3.php");
	if(isset($_SESSION['gid1']))
	{
		unset($_SESSION['gid1']);
	}
					
?>
<html>
<title> Add game</title>
<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Add game</font>
			</h1>
	
<form action="gameback.php" method="post">

<table width="489" cellspacing="20">
	<tr>
		<td><font size="+3">Enter game</font></td>
		<td><input type="text" class="text" name="txt_game" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
<?php

			if(isset($_SESSION['game']))
			{
				echo "<font color='red'>please enter proper game</font>";
				unset($_SESSION['game']);
			}
?>
</td>
</tr>
<tr>
<td colspan="2" align="center">
		<br>
		<input  name="btn_submit" class="button-3" type="submit" value="Click to add game"  /></td>
</tr>
</form></Table><br /><br /><br /><br />
<table border="3" width="650" height="88" ">
	<tr> 
		<th bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">No.</font></th>
		<th bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">game Name</font></th>
		<th bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">UPDATE</font></th>
		<th bgcolor="#242424" background="img/bg_box_head.jpg"style="border-left: 1px solid #ffffff; border-right: 1px solid #ffffff;"><font color="#FFFFFF">DELETE</font></th>
	</tr>
	
<?php
	$selectgame=mysqli_query($con,"select * from game ORDER BY `gid` ASC");
	 while($data=mysqli_fetch_array($selectgame))
	 {
	 	?>
			<tr >
				<td align="center">
		<?php
	 	echo $data['gid'];
		?>
				</td>
				<td align="center" >
		<?php
			echo $data['game_name'];
		?>
				</td>	
				
		<?php
			echo "<td align='center' title='Update game Name'><a href=game_update.php?id=".$data['gid']."><font color='#660099'>Update</font></a></td>";
			echo "<td align='center' title='delete game Name'><a href=game_delete.php?id=".$data['gid']."><font color='#660099'>delete</font></a></td></tr>";
	 }
?>
</tr>
</table><br />

<a href="admin.php"><font color="#990000" size="+2"><-Back To Admin  Page</font></a>

</body>
</html>
<?php
}
else
	header("location:../index.php");
?>