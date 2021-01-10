<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{
		
			if(isset($_SESSION['check']))
			{
				$_SESSION['midedit']=$_GET['mid'];
				$_SESSION['rid']=$_GET['rid'];
				unset($_SESSION['check']);
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				header("location:offerdetails.php");
			}
		?>
<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>
<? ob_flush(); ?>