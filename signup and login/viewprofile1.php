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

	</style>
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Profile </font>
			
			</h1>
			<html>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
			
			 $alias_id=$_GET['aliasid'];
			$sqlq=mysqli_query($con,"select * from images where reg_id='".$alias_id."'");
				if(($row=mysqli_fetch_array($sqlq))!= NULL)
				{
				
									echo '<img  style="margin-bottom:150px;height:200px;width:200px;" onerror=this.src="img/blank.jpg" src="images/'.$row[1].' " > ';
	 
	 
				}
				else
				{
										echo '<img  style="margin-bottom:150px;height:200px;width:200px;" onerror=this.src="img/blank.jpg" src="img1/blank.jpg" > ';
				}
			?>
			
					<body>
					<h1 style="background-color:#382748;margin-bottom:10px;"><font color="#FFFFFF">&nbsp;&nbsp; User Details</font>
				</h1>
			<?php $query=mysqli_query($con,"select * from signup_details where reg_id ='".$alias_id."' ");
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
					<table width="816" height="410" border="0">
  <tr>
    <td width="232" height="48" align="center">FIRST NAME </td>
    <td width="568"> 
		<?php 
							if($info[1]=="all")
							{
								echo $data[1];
							}
							else if($info[1]=="friend")
							{
								echo $data[1];
							}
							else if($info[1]=="private")
							{
								echo "Confidential";
							} 
						?>				
	</td>
  </tr>
  <tr>
    <td height="63"  align="center" >LAST NAME </td>
    <td>
		<?php 
							if($info[1]=="all")
							{
								echo $data[2];
							}
							else if($info[1]=="friend")
							{
								echo $data[2];
							}
							else if($info[1]=="private")
							{
								echo "Confidential";
							} 
						?>				
	</td>
  </tr>
  <tr>
    <td height="60"  align="center">FULL NAME </td>
    <td>
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
						?>				
	</td>
  </tr>
  
  <tr>
    <td height="52"  align="center" >ALIAS NAME</td>
    <td><?php 
		$query1=mysqli_query($con,"select * from alias where reg_id ='".$alias_id."' ");
						$data1=mysqli_fetch_array($query1);
					
	echo $data1[1];?></td>
  </tr>
  <tr>
    <td height="52"  align="center" >EMAIL-ID </td>
    <td> <?php 
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
						?></td>
  </tr>
  <tr>
    <td height="63"  align="center" >GENDER </td>
    <td> 
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
						?>
	</td>
  </tr>
  <tr>
    <td height="54"  align="center" >CONTACT NUMBER </td>
    <td>
	<?php 					if($info[3]=="all")
							{
								echo $data[4];
							}
							else if($info[3]=="friend")
							{
								echo $data[4];
							}
							else if($info[3]=="private")
							{
								echo "It is Confidential";
							} 
						?>	
	</td>
  </tr>
  
</table>
<br>
					</body>
				</html>
			<?php
			}
				$alias_id=$_SESSION['alias'];
			 	if(isset($_POST['submit12']) )
				{
					$alias_id=$_SESSION['alias'];
					$status="pending";
					$_SESSION['request_status']=$status;
					$i=mysqli_query($con,"insert into friend_request(sid,rid,status) values('$reg_id','$alias_id','$status')");
					
					$_SESSION['notification']=1;
					$_SESSION['notification_page']=1;
				?>
				
				<?php	
				}
				if(isset($_POST['submit12']) || isset($_POST['submit2']) || isset($_SESSION['notify']) )
				{
					
					$query_checker=mysqli_query($con,"select * from friend_request where (sid='".$reg_id."' AND rid='".$alias_id."') OR (sid='".$alias_id."' AND rid='".$reg_id."')   AND (status='pending' OR status='matching')");
					if(($info12=mysqli_fetch_array($query_checker))== NULL)
						{
												
?>
							<form method="POST" action="viewprofile.php">
							<input type="text" name="txt_friend" style="display:none;" value="pending">
							<input type="submit"  name="submit12" style="background:#FF6600;margin-top: -698px;
    margin-left: 391px;" class="button-3"   value="Add Friend" />
							</form>
<?php                   }
					
					else
					{	
						
							
							if($info12[3] == "pending")
							{
?>
								<form method="POST" action="viewprofileback.php">
					   			<input type="submit" name="undo" style="background:#FB1E1E;    margin-top: -698px;
    margin-left: 391px;" class="button-3" value="Unsend the request" /></form>
				<?php       } 
							else if($info12['status'] == 'matching')
							{
				?>
						<form method="POST" action="viewprofileback.php">
				   		<input type="submit" name="unfriend" style="background:#FB1E1E;    margin-top: -698px;
    margin-left: 391px;" class="button-3" value="Unfriend" /></form>
				 <?php
							}
						}
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