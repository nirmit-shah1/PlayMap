<? ob_start(); ?>
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
	<style type="text/css">
						.button-3
					{
						
						
							
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
						
					}
					.button-3:hover, 
					.button-3:focus 
					{	
						text-decoration: none;
						color: #fff;
					}
					
					.button-3:active
					 {
						transform: translate(0px,5px);
						-webkit-transform: translate(0px,5px);
						border-bottom: 1px solid;
					}

	.button-31 {						
						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-311 {						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-32 {						
						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-33 {						
						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-34 {						
						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    body,td,th {
	font-size: medium;
}
body {
	background-color: #000000;
}
.button-331 {						
						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-35 {						
						
							
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    .button-3311 {						
						height: 42px;
						width: 237px;
						float: none;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
}
    </style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Add Friends</font>
			</h1>
			<?php if(isset($_SESSION['undorequest'])){?>
			<h3 style="background-color:#E0EC04;color:#FFFFFF">Friend Request has been Successfully riverted</h3>
			<?php unset($_SESSION['undorequest']);
			}?>
			<?php if(isset($_SESSION['accept'])){?>
			<h3 style="background-color:#00CC00;color:#FFFFFF">Best of Luck For New Friendship</h3>
			<?php unset($_SESSION['accept']);
			}?>
			<?php if(isset($_SESSION['unfriendrequest'])){?>
			<h3 style="background-color:#FF0000;color:#FFFFFF">YOU ARE NO MORE FRIEND WITH HIM</h3>
			<?php unset($_SESSION['unfriendrequest']);
			}?>
			
			
			<table width="836" height="150" border="0">
			<form method="POST" action="addfriendback.php">
			<tr>
				<td colspan="2">
			<font color="black" size="+2"><b>&nbsp;&nbsp;&nbsp;&nbsp;Alias Name</b></font>&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td colspan="3" rowspan="2" style="width: 100px;">
			  <input type="text" placeholder="Case Sensitive" style="border-radius: 25px; width: 200px;
  height: 80px; border-color:#666666" id="aid" name="txt_alias" autofocus />
			  
			
				<?php
					if(isset($_SESSION['aliasnullerror']))
					{
						echo "<font color='red'>please enter alias name</font>";
						unset($_SESSION['aliasnullerror']);
					}
				?>
			</td>
			<td width="371" colspan="4" align="left">
			<input type="submit"  name="submit" class="button-3"  value="Search" />
			</td>
			</tr>
			<tr></tr>
		</form>	
		  </table>
<!------------------------------------------SEARCH SECTION----------------------------------------------------->
			<br><br>
			<?php
				if(isset($_SESSION['searchresult']))
				{
			?>
				<h1 style="background-color:#382748;"><font color="#FFFFFF">&nbsp;&nbsp; Search Result</font>
				</h1>
				<?php
					if(isset($_SESSION['alias']))
					{
						$alias_id=$_SESSION['alias'];
						$_SESSION['receivermsg_id']=$alias_id;
						$query=mysqli_query($con,"select * from signup_details where reg_id ='".$alias_id."' ");
						if (!$query)
						{
						    printf("Error: %s\n", mysqli_error($con));
    						exit();
						}
					
						while($data=mysqli_fetch_array($query))
						{
							$priv=mysqli_query($con,"select * from privacy where reg_id ='".$alias_id."' ");
							$info=mysqli_fetch_array($priv);
							$priv1=mysqli_query($con,"select * from login where reg_id ='".$alias_id."' ");
							$info1=mysqli_fetch_array($priv1);
						
						?>
					<table align="center" width="956" height="202" border="0">
					  <tr>
						<td colspan="3" rowspan="4"><?php $sqlq=mysqli_query($con,"select * from images where reg_id='".$alias_id."'");
				while($row=mysqli_fetch_array($sqlq))
				{
					echo '<img  style="margin-bottom:150px;height:100px;width:100px;" onerror=this.src="img/blank.jpg" src="images/'.$row[1].' " > ';
	 
	 
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
						$query_checker=mysqli_query($con,"select * from friend_request where (sid='".$reg_id."' AND rid='".$alias_id."') OR (sid='".$alias_id."' AND rid='".$reg_id."')   AND (status='pending' OR status='matching')");
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
						$query1=mysqli_query($con,"select * from alias where reg_id ='".$alias_id."' ");
						$data1=mysqli_fetch_array($query1);
						
								echo $data1[1];
						?> </td>

						<td width="150" colspan="2" rowspan="2">
						<form method="POST" action="viewprofile.php">
						
						<input type="text" name="txt_friend" style="display:none;"  value="nothing" >
						<input type="submit"  name="submit2" style="background:#FB1E1E" class="button-32"  value="View Profile" />
						</form></td>
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
					  <tr align="center">
					  <td colspan="4">
					  <form action="privatemessage.php" method="post">
					  <input type="submit" class="btn btn-info active" value="Send  Message">
					  </form>
					  </td>
					  </tr>
		  </table>
					<br><br>

					<?php
					}
						unset($_SESSION['searchresult']);
						
					
					}
					else if(isset($_SESSION['notfound']))
					{
					?>
					&nbsp;&nbsp;&nbsp;<h5><font color="#FF0000">&nbsp;&nbsp;&nbsp;A PlayMap member with this alias name does not exist.</h5>
					<?php	
						unset($_SESSION['notfound']);
						unset($_SESSION['searchresult']);
						
					}
				?>	
					
			<?php
				}
				?>
		<?php				
		$query11=mysqli_query($con,"select * from friend_request where rid='".$reg_id."' AND status='pending' ");
					while($info=mysqli_fetch_array($query11))
					{?>
					<h1 style="background-color:#382748;"><font color="#FFFFFF">&nbsp;&nbsp; Pending Friend Request</font>
		  </h1>
		<?php
						$id=$info[1];
						$_SESSION['senderid']=$id;
						$query=mysqli_query($con,"select * from signup_details where reg_id ='".$id."' ");
						$data=mysqli_fetch_array($query);
						$priv=mysqli_query($con,"select * from privacy where reg_id ='".$id."' ");
				    	$info=mysqli_fetch_array($priv);
             			$priv1=mysqli_query($con,"select * from login where reg_id ='".$id."' ");
			    		$info1=mysqli_fetch_array($priv1);
						
					?>
					<table align="center" width="957" height="169" border="0">
					  <tr>
						<td colspan="3" rowspan="4"><?php $sqlq=mysqli_query($con,"select * from images where reg_id='".$id."'");
				while($row=mysqli_fetch_array($sqlq))
				{
				echo '<img  style="margin-bottom:150px;height:100px;width:100px;" onerror=this.src="img/blank.jpg" src="images/'.$row[1].' " > ';
	 
				}?></td>
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
						<td width="237" colspan="2" rowspan="1">
						<form method="POST" action="pendingrequestback.php">
						  <input type="submit"  name="submit11" style="background:#FF6600" class="button-3311"  value="Accept" />
						</form></td>
					  </tr>
					  <tr>
						<td> Email-id:= 
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
						?>						</td><td>
						<form method="POST" action="pendingrequestback.php">

						<input type="submit"  name="submit21" style="background:#FF6600" class="button-35"  value="Decline" />
						</form></td>
					  </tr>
					  <tr>
						<td height="45"> Alias Name:=
						<?php 
							$query1=mysqli_query($con,"select * from alias where reg_id ='".$id."' ");
						$data1=mysqli_fetch_array($query1);
					
								echo $data1[1];
						?> </td>

						<td width="237" colspan="2" rowspan="2">
						
						<form method="POST" action="<?php echo "seeprofile.php?gid=".$id."";?>">
						<input type="text" name="txt_friend" value="nothing" style="display:none;">
						<input type="submit"  name="submit3" style="background:#FB1E1E" class="button-34"  value="View Profile" />
						</form></td>
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
					 
			
		  </table>
		  
					<br><br>
					<?php
}
?>
		</div>
</body>
</html>
<?php


	}
	else
	{
		header("location:../index.php");		
	}

?>
<? ob_start(); ?>	