<? ob_start(); ?>
<?php
	session_start();
	include("../connection.php");
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		
		$reg_id=$_SESSION['reg_id'];
		if($_POST['txt_alias']==NULL)
		{
			$_SESSION['aliasnullerror']=1;
			header("location:addfriend.php");
			
		}
		else
		{
		
			$aid=$_POST['txt_alias'];
			echo $aid;
//			signup_details.reg_id,signup_details.fname,signup_details.lname,signup_details.gender,signup_details.phno,alais.alias_name
			$query0=mysqli_query($con,"select reg_id from alias where BINARY alias.alias_name='".$aid."'");
			$data0=mysqli_fetch_array($query0);
			$main_id=$data0[0];
			$query=mysqli_query($con,"select * from signup_details where reg_id='".$main_id."'");

				if($data=mysqli_fetch_array($query))
				{
					echo $reg_id; 
					if($reg_id == $data[0])
					{
						header("location:addfriend.php");
					}
					else
					{
					$_SESSION['searchresult']=1;
					$_SESSION['alias']=$data[0];
					echo $data[0]; 
					header("location:addfriend.php");
					}
				}
				else
				{

					$_SESSION['notfound']=1;
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
<? ob_start(); ?>