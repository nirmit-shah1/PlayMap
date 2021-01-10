<html>

	<head>
	<title>Forget Password</title>
	<link href="style-box.css"  rel="stylesheet" type="text/css" >
	</head>
<?php	
session_start();
	include("../toptemplate.php");
	include("hmenu1.php");
	$uinfo=$_GET["uinfo"];
	
	
?>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Forget Password</font>
			</h1>
			<form action="forgetpasswordback.php?uinfo=<?php echo $uinfo;?>" method="POST">
					<br /><font color="red"></font>
			Enter E-Mail Id:
			<input type="text" class="text" name="txt_email" placeholder="Enter your E-mail" autocomplete="off"/>
			<?php if(isset($_SESSION['txt_emailerror'])){echo "<font color=red>Enter Email</font>";unset($_SESSION['txt_emailerror']);}?>
		<br><br><br><input  type="submit" class="btn btn-success"  name="btn_search" value="search" />
		</form>
		<form action="login.php?uinfo=<?php echo $uinfo;?>" method="post" >
			<input type="submit"  name="btn_cancel" value="Login" class="btn btn-warning" />
		</form>

			
		</div>
		</body>
		</html>