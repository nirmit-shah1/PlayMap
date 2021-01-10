<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
<title>Untitled Document</title></head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Friends</font></h1>


<?php

		$sql0=mysqli_query($con,"select * from friend_request where status='matching' ");
		while($data1=mysqli_fetch_array($sql0))
		{
		$id=0;
			if ($data1['sid']==$reg_id || $data1['rid']==$reg_id)
			{
				
				if($reg_id==$data1['sid'])
					$id=$data1['rid'];
				else if($reg_id==$data1['rid'])
					$id=$data1['sid'];
				else
					echo "error";
				$sql1=mysqli_query($con,"select * from signup_details where reg_id='".$id."' ");
				while($data=mysqli_fetch_array($sql1))
				{
					$priv=mysqli_query($con,"select * from privacy where reg_id ='".$id."' ");
							$info=mysqli_fetch_array($priv);
							$priv1=mysqli_query($con,"select * from login where reg_id ='".$id."' ");
							$info1=mysqli_fetch_array($priv1);
						
						?>
					<table align="center" width="956" height="202" border="0">
					  <tr>
						<td colspan="3" rowspan="4"><?php $sqlq=mysqli_query($con,"select * from images where reg_id='".$id."'");
				if(($row=mysqli_fetch_array($sqlq))!= NULL)
				{
				
									echo '<img  style="margin-bottom:150px;height:200px;width:200px;" onerror=this.src="img/blank.jpg" src="images/'.$row[1].' " > ';
	 
	 
				}
				else
				{
										echo '<img  style="margin-bottom:150px;height:200px;width:200px;" onerror=this.src="img/blank.jpg" src="img1/blank.jpg" > ';
				}?> </td>
						<td width="417"><font face="Verdana, Arial, Helvetica, sans-serif" >NAME:=
						<?php 
							if($info[1]=="all")
							{
								echo $data[1]." ".$data[2];
							}
							else if($info[1]=="friend")
							{
								echo $data[1]." ".$data[2];
							}
							else if($info[1]=="private")
							{
								echo $data[1];
							} 
						?>						</td>
						<td width="150" colspan="2" rowspan="2">
						<?php				
						$query_checker=mysqli_query($con,"select * from friend_request where (sid='".$reg_id."' AND rid='".$id."') OR (sid='".$id."' AND rid='".$reg_id."')   AND (status='pending' OR status='matching')");
						if(($info12=mysqli_fetch_array($query_checker))== NULL)
						{
					
						?>
						<form method="POST" action="viewprofile.php">
						<input type="text" name="txt_friend" style="display:none;" value="pending">
						<input type="submit"  name="submit12" style="background:#FF6600" class="button-311"  value="Add Friend" />
						</form>
						<?php } ?></td>
					  </tr>
					  <tr>
						<td height="62"> Email-id:= 
						<?php 
							if($info[2]=="all")
							{
								echo $info1[1];
							}
							else if($info[2]=="friend")
							{
								echo $info1[1];
							}
							else if($info[2]=="private")
							{
								echo "It is Confidential";
							} 
						?>						</td>
					  </tr>
					  <tr>
						<td height="45"> Alias Name:=
						<?php 
						$query1=mysqli_query($con,"select * from alias where reg_id ='".$id."' ");
						$data1=mysqli_fetch_array($query1);
						
								echo $data1[1];
						?> </td>

						<td width="150" colspan="2" rowspan="2">
						<form method="POST" action="viewprofile1.php?aliasid=<?php echo $id;?>">
						
						<input type="text" name="txt_friend" style="display:none;"  value="nothing" >
						</td>
						</tr>
					  <tr>
						<td>Gender:=
						<?php 
							if($info[4]=="all")
							{
								echo $data[3];
							}
							else if($info[4]=="friend")
							{
								echo $data[3];
							}
							else if($info[4]=="private")
							{
								echo "It is Confidential";
							} 
						?>						</td>
					  </tr>
					  <tr>
						<td colspan="4" align="center">
						<input type="submit"  name="submit2" class="btn btn-danger"  value="View Profile" />
						</form></td>
					  
		  </table>
					<br><br>
					<?php 
				}
				
			}
			
		}
			
	}
	else
	{
		header("location:../index.php");		
	}

?>

</body>
</html>
