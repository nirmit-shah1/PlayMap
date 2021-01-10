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
		

	<body>
		<form action="privatemessageback.php" method="post" ><br />
	
			<table width="543" height="206" cellspacing="10" class="trip"> 
				<tr>
					<td	>
			Message </td>
					<td><textarea name="txt_message" placeholder="Message to be send" cols="50" rows="5"></textarea>
					</td></tr>
					<?php if(isset($_SESSION['messageerror'])){echo "<tr><td><font color=red>Enter Message First</font></td></tr>";unset($_SESSION['messageerror']);}?>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="btn_message" class="btn btn-warning" value="Send Message" />
					</td>
				</tr>
					<?php if(isset($_SESSION['messagesent'])){echo "<tr><td></td><td align=center><font color=green>Message Sent Successfully</font></td></tr>";unset($_SESSION['messagesent']);}?>
					<?php if(isset($_SESSION['ownmessageerror'])){echo "<tr><td></td><td align=center><font color=red>Message Cannot sent to yourself </font></td></tr>";unset($_SESSION['ownmessageerror']);}?>
		  </table>
					
		</form>		 
		
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
