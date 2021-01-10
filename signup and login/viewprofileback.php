<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		$alias_id=$_SESSION['alias'];
		echo $reg_id;
		echo $alias_id;
		if(isset($_POST['undo']))
		{		$query_checker=mysqli_query($con,"delete  from friend_request where (sid='".$reg_id."' AND rid='".$alias_id."') OR (sid='".$alias_id."' AND rid='".$reg_id."') AND status='pending' ");
						if(($query_checker))
						{
							$_SESSION['undorequest']=1;
							header("location:addfriend.php");
						}
		}
		else if(isset($_POST['unfriend'])) 
		{
			$query_checker=mysqli_query($con,"delete  from friend_request where (sid='".$reg_id."' AND rid='".$alias_id."') OR (sid='".$alias_id."' AND rid='".$reg_id."') AND status='matching' ");
						if(($query_checker))
						{
							$_SESSION['unfriendrequest']=1;
							header("location:addfriend.php");
						}
		}
	}
	else
	{
		header("location:../index.php");		
	}

?>