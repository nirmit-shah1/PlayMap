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
<body style=" background-image:url(../img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; How it works?</font>
			</h1>
			<br>
			<ul>
			<li>Primaly the user has to register to the website in order to access the services.</li>
			<li>Secondly using the crendials he or she can login into the system.</li>
			<li>After that they can select the functionalities that they want to perform</li>
			<li>The user interface is very simple and convienet so that user do not face any type of difficulties.</li>
			<li>Navigation is also properly provided so that they do not get confuse while using it.</li>
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
	