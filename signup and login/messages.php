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
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Message to Friends</font></h1>
		<form action="" method="post">
	
	<?php 
		$receiverid=$reg_id;
		$nmsg=0;
		$query=mysql_query("select * from privatemessage where receiverid = $receiverid");
		if(mysql_num_rows($query)>=1)
		{
			
			?> 
			<table>
			<?php
			$query=mysql_query("select senderid from privatemessage where receiverid = $receiverid group by senderid asc");
			while($data1=(mysql_fetch_array($query)))
			{
				$nmsg=0;
				$senderid=$data1['senderid'];//IT WILL GIVE REG_ID OF SENDEER USER
				$query2=mysql_query("select * from signup_details where reg_id=$senderid");
				while($data2=mysql_fetch_array($query2))
				{
				$query3=mysql_query("select * from privatemessage where senderid=$senderid and receiverid = $receiverid");
				while($data3=mysql_fetch_array($query3))
				{	
					if($data3['counter']==1)
						$nmsg++;
				}		
				?>
					<tr>
						<td>
						<?php 
						 	echo $data2['firstname']." ".$data2['lastname']."($nmsg)</a>";
							echo "&nbsp";
							echo "<a href=personalmessage.php?senderid=".$data1['senderid']."><br> 			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspMessages-></a>";
							echo "&nbsp";
		echo "<a style='color:#3366FF' href=passangerprofileinfo.php?senderid=".$data1['senderid']."><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspView Details-></a>";
						?>
						</td>
					</tr>	
					<?php
				}
			}	
		}
		else
		{
			echo "You have no Messages !!!";
		}
		?>
	</table>
	</form>
	</div>
		 
		
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
