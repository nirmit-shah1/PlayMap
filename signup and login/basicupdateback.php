<?php
session_start();

if(isset($_SESSION['adminusername']))
{ 

include_once("../connection.php");
$a=$_SESSION['regid'];
$f=$_POST['txtfname'];
$l=$_POST['txtlname'];
$c=$_POST['txtcontact'];
$e=$_POST['txtemail'];
$p=$_POST['txtpass'];
$iid=$_GET['id'];
$str="location:basicupdate.php?id=".$iid;
if(isset($_POST['submit']))
	{
	
		if($_POST['txtfname']!=NULL)
		{		
			$f=$_POST['txtfname'];
			echo "hello";
			$_SESSION['fnamevalue']=$f;
			
		}
		else
		{
			$_SESSION['fnameerror']=1;
			header($str);
			
		}
		if($_POST['txtlname']!=NULL)
		{		
			$l=$_POST['txtlname'];
			$_SESSION['lnamevalue']=$l;
		
		}
		else
		{
			$_SESSION['lnameerror']=2;
			header($str);
		}
		if($_POST['txtcontact']!= NULL)
		{		
			$c=$_POST['txtcontact'];
			$_SESSION['contactvalue']=$c;
		}
		else
		{
			$_SESSION['contacterror']=3;
			header($str);
		}
		if($_POST['txtemail']!= NULL)
		{		
			$e=$_POST['txtemail'];
			$_SESSION['emailvalue']=$e;
		}
		else
		{
			$_SESSION['emailerror']=4;
			header($str);
		}
		if($_POST['txtpass'] != NULL)
		{		
			$p=$_POST['txtpass'];
			$_SESSION['passvalue']=$p;
		}
		else
		{
			$_SESSION['passerror']=1;
			header($str);
		}

if(!($_POST['txtfname']==NULL || $_POST['txtlname']==NULL || $_POST['txtcontact']==NULL  || $_POST['txtemail']==NULL || $_POST['txtpass']==NULL))
		{
					echo"fsfsf";
				unset($_POST['submit']);
				unset($_SESSION['fnamevalue']);
				unset($_SESSION['lnamevalue']);
				unset($_SESSION['contactvalue']);
				unset($_SESSION['passvalue']);
				unset($_SESSION['emailvalue']);
				
		
$sql22= "update signup_details set fname='$f',lname='$l', phno='$c' where reg_id='".$a."'";
//echo "update signup_details set firstname='$f',lastname='$l',contactno='$c' where reg_id=$a";
$result22=mysqli_query($con,$sql22);
$sqly="update login set email='$e' , password='$p' where reg_id='".$a."'";
//echo "update login set email='$e', password='$p' where reg_id=$a";die();
$resulty=mysqli_query($con,$sqly);
if($result22 && $resulty)
{
	
	unset($_SESSION['$regid']);
	header("location:admin.php");
}

	

/*echo "reg_id:=".$a;
echo "fname:=".$f;
echo "lname:=".$l;
echo "contact:=".$c;
echo "email:=".$e;
echo "pass:=".$p;*/
}
}
}
else
	header("location:../index.php");
?>