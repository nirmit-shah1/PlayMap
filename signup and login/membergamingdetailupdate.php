<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		
	if(isset($_SESSION['rid']))
	{
		$rid=$_SESSION['rid'];
	?>
	

<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
		<script type="text/javascript">
	function subtractQty(){
	if(document.getElementById("qty").value - 10 < 10)
	return;
	else
	{
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	document.getElementById("qty").value--;
	}
	}
	
	</script>
		
</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Game Details Update</font>
			</h1>

		<?php
			if(isset($_SESSION['midedit']))
			{
				$query2=mysqli_query($con,"select * from membergamingdetails where mid='".$_SESSION['midedit']."'");
				$detail=mysqli_fetch_array($query2);
				?>
					<form action="demo1_back.php" method="get">
			<table class="trip" cellpadding="5">
				<tr><td colspan="2">
				<font size="+1"><b>Game Details</b></font>
			</td></tr>
				<tr>
					<td>Price per player</td>
					<td  align="right" style="padding-right:30px">
						<input type='text' value="<?php echo $detail['priceperplayer']; ?>" class="icon1" readonly="true" name='qty' id='qty' style="width:100px; height:40px;"/>
						<input type='button' name='add' style="background-color:#00FF00;height:40px; width:40px;" onclick='javascript: document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;' value='+'/>
						<input type='button' name='subtract' style="background-color:#FF0000; height:40px; width:40px; font-size:20px;" onclick='javascript: subtractQty();' value='-'/>
					</td>
				</tr>
				<tr>
					<tD>Number of players required:
					</tD>
					<td>
						<select name="spaceavailable" class="form-control">
							<option value="1"<?php if($detail['spaceavailable']==1){ echo "selected=selected";} ?>>1</option>
							<option value="2"<?php if($detail['spaceavailable']==2){ echo "selected=selected";} ?>>2</option>
							<option value="3"<?php if($detail['spaceavailable']==3){ echo "selected=selected";} ?>>3</option>
							<option value="4"<?php if($detail['spaceavailable']==4){ echo "selected=selected";} ?>>4</option>
							<option value="5"<?php if($detail['spaceavailable']==5){ echo "selected=selected";} ?>>5</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Maximum Game Experience:
					</td>
					<td>
						<select name="exp" class="form-control">
							<option <?php if($detail['exp']=="Football"){ echo "selected=selected";} ?>>Football</option>
							<option <?php if($detail['exp']=="Cricket"){ echo "selected=selected";} ?>>Cricket</option>
							<option <?php if($detail['exp']=="Baseball"){ echo "selected=selected";} ?>>Baseball</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>I will wait:
					</td>
					<td>
						<select name="wait" class="form-control">
							<option value="On time" <?php if($detail['wait']=="On time"){ echo "selected=selected";} ?>>Right on time</option>
							<option value="Fifteen minutes" <?php if($detail['wait']=="Fifteen minutes"){ echo "selected=selected";} ?>>In a 15 minute window</option>
							<option value="THIRTY_MINUTES" <?php if($detail['wait']=="THIRTY_MINUTES"){ echo "selected=selected";} ?>>In a 30 minute window</option>
							<option value="TWO_HOURS" <?php if($detail['wait']=="TWO_HOURS"){ echo "selected=selected";} ?>>In a 2 hour window</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>I can make a delay
					</td>
					<td>
						<select name="delay" class="form-control">
							<option value="NO delays" <?php if($detail['delay']=="NO delays"){ echo "selected=selected";} ?>>I'm not willing to make a delay</option>
							<option value="Fifteen minutes delay max." <?php if($detail['delay']=="Fifteen minutes delay max."){ echo "selected=selected";} ?>>15 minute delay max.</option>
							<option value="Thirty minutes delay max." <?php if($detail['delay']=="Thirty minutes delay max."){ echo "selected=selected";} ?>>30 minute delay max.</option>
							<option value="Whatever it takes" <?php if($detail['delay']=="Whatever it takes"){ echo "selected=selected";} ?>>Anything is fine</option>
						</select>
					</td>
				</tr>
			</table><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type="submit" name="btn_updateoffer" value="Update publised Offer" />
		</form>
		<br>
				<?php		
			}
			?>
	</body>
	</html>
<?php
	}
	else
		header("location:offerdetails.php");
}

	else
	{
		header("location:../index.php");		
	}

?>