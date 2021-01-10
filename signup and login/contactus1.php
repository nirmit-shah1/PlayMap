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
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Contact Us</font>
			</h1>
			<br>
			<ul>
			email-id:-&nbsp;&nbsp;dnt1997@gmail.com</li><br><br>
<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kushansomani@gmail.com</li><br><br>
<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nirmitshah803@gmail.com</li><br><br></ul>
<h1><b>Helpline number</b></h1><br>
<ul>
<li><u>079-24343455</u></li><br>
<li><u>+91-9876567843</u></li><br>
<li><u>+91-9126567843</u></li><br><br>
</ul>

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
	