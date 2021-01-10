<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		$senderid=$_GET['senderid'];
		$_SESSION['senderid']=$senderid;
	
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Message to Friends</font></h1>
<form action="messageback.php" method="post">
	
	<?php 
		$receiverid=$reg_id;
		$nmsg=0;
		$query=mysqli_query($con,"select * from privatemessage where receiverid = $receiverid and senderid=$senderid");
		if(mysqli_num_rows($query)>=1)
		{
			while($data=mysqli_fetch_array($query))
			{
				if($data['counter']==1)
					$nmsg++;
			}
			echo "Unread Messages(".$nmsg.")";
			$query1=mysqli_query($con,"update privatemessage set counter = 0 where receiverid=$receiverid and senderid=$senderid");
		?> <br /><br />
		<table class="trip">
		<?php
			$query=mysqli_query($con,"select * from privatemessage where ((receiverid = $receiverid and senderid =$senderid) ||(receiverid = $senderid and senderid = $receiverid) ) order by messageid asc");
//			$query=mysqli_query($con,"select * from privatemessage where  order by messageid desc");
			while($data1=(mysqli_fetch_array($query)))
			{
				$senderid=$data1['senderid'];
				$query2=mysqli_query($con,"select * from signup_details where reg_id=$senderid");
				while($data2=mysqli_fetch_array($query2))
				{
					if($data2['reg_id']==$receiverid)
					{		
?>
						<tr>
							<td style="padding-right:70px;" align="right" class="message">
								<textarea name="txt_message" cols="30" rows="3"readonly="readonly"><?php echo $data1['message']; ?></textarea></td>
						</tr>
						
<?php
					}
					else
					{		
?>
						<tr>
							<td>
								<?php echo $data2['firstname']." ".$data2['lastname']; ?>
							</td>
						</tr>			
						<tr>
							<td style="padding-left:70px;" class="message">
								<textarea name="txt_message" cols="30" rows="3"readonly="readonly"><?php echo $data1['message']; ?></textarea></td>
						</tr>
						
<?php			
					}	
				}
			}	
?>
			<tr>
					<td align="right">
						<textarea name="txt_message" cols="30" rows="3" style="margin-right:20px;"></textarea>
						<input type="image"  style="background:#0033CC; padding:10px;" src="icon.png" name="btn_send"/>
					</td>
				</tr>
<?php
		}
		else
		{
			echo "You have no Messages !!!";
		}
		?>
	</table>
	</form>
<a href="message.php" style="color:#990000; font-size:26px;"><<-Back T0 Message Page</a>
</body>
</html>
		
		 
		
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
