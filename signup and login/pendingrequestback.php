<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
		$id=$_SESSION['senderid'];
		echo $reg_id;
		echo $id;
		if(isset($_POST['submit11']))
		{
			$_SESSION['accept']=1;
			$qr1=mysqli_query($con,"UPDATE friend_request SET status='matching' where (sid='".$reg_id."' AND rid='".$id."') OR (sid='".$id."' AND rid='".$reg_id."') AND status='pending'");
			header("location:addfriend.php");
		}
		else if(isset($_POST['submit21'])) 
		{
			$query_checker=mysqli_query($con,"delete  from friend_request where (sid='".$reg_id."' AND rid='".$alias_id."') OR (sid='".$alias_id."' AND rid='".$reg_id."') AND status='matching' ");
						if(($query_checker))
						{
							$_SESSION['unfriendrequest']=1;
							header("location:addfriend.php");
						}
		}

?>
<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>
