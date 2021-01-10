-<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
		{
			if(isset($_SESSION['gamesuccess']))
			{	
				unset($_SESSION['gamesuccess']);
				include("toptemplate1.php");
				include("hmenu.php");
				include("../connection.php");
				$reg_id=$_SESSION['reg_id'];	
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
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Gaming Details</font>
			</h1>
			<form action="demo1_back.php" method="get">
			<table class="trip" cellpadding="5">
				<tr><td colspan="2">
				<font size="+1"><b>Game Details</b></font>
			</td></tr>
				<tr>
					<td>Price per game</td>
					<td  align="right" style="padding-right:30px">
						<input type='text' value="10" class="icon1" readonly="true" name='qty' id='qty' style="width:100px; height:40px;"/>
						<input type='button' class='btn btn-primary' name='add' style="background-color:#00FF00;height:40px; width:40px;" onclick='javascript: document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;document.getElementById("qty").value++;' value='+'/>
						<input type='button' name='subtract' style="background-color:#FF0000; height:40px; width:40px; font-size:20px;" onclick='javascript: subtractQty();' value='-'/>
					</td>
				</tr>
				<td>Game:
					</td>
					<td>
						<select name="exp" id="selected">
							<?php
					$query1=mysqli_query($con,"select * from game");
					while($data1=mysqli_fetch_array($query1))
					{
						
						if(isset($_SESSION['gamequestionvalue']))
						{
							if($_SESSION['gamequestionvalue']==$data1[1])
							{
								echo "<option value=$data1[1] selected=selected>$data1[1]</option>";					
								unset($_SESSION['gamequestionvalue']);
							}
							else
							{
								echo "<option value=$data1[1]>$data1[1]</option>";					
							}
						}
						else
						{
							echo "<option value=$data1[1]>$data1[1]</option>";					
						}
					}
				?>
				
					</td>
				</tr>
				<tr>
					<tD>Number of players required:
					</tD>
					<td>
						<select name="spaceavailable" id="no">
						</select>
					</td>
				</tr>
				<tr>
					
				<tr>
					<td>I will begin game:
					</td>
					<td>
						<select name="wait">
							<option value="On time" selected="selected">Right on time</option>
							<option value="Fifteen minutes">In a 15 minute window</option>
							<option value="THIRTY_MINUTES">In a 30 minute window</option>
							<option value="TWO_HOURS">In a 2 hour window</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>I can delay game for:
					</td>
					<td>
						<select name="delay">
							<option value="NO detours">I'm not willing to make a delay</option>
							<option value="Fifteen minutes delay max." selected="selected">15 minute delay max.</option>
							<option value="Thirty minutes delay max.">30 minute delay max.</option>
							<option value="Whatever it takes">Anything is fine</option>
						</select>
					</td>
				</tr>
			</table>
			<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" style="background-color:#00CCFF; width:15%;" type="submit" name="btn_publisoffer" value="Publish Offer" />
		</form>
		<br><br>	
		<?php
			$_SESSION['exp1']=1;
		?>
	</body>
	</html>
<?php
}
else
	header("location:demo1.php");
}
	else
	{
		header("location:../index.php");		
	}

?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $('#selected').on('change',function(){
        var stateID = $(this).val();
        	if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){

                 $('#no').html(html);

                }
            }); 
        }
    });
});

</script>


</html>
