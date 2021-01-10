<?php
ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);	
	session_start();

	$str4="location:adduser.php";
	include_once("../connection.php");
	
	if(isset($_POST['submit']))
	{
		if($_POST['txtfname']==NULL)
		{
			$_SESSION['namerror']=1;
			header($str4);
		}
		else
		{
			$nam=$_POST['txtfname'];
			$_SESSION['namevalue']=$nam;
		}
		if($_POST['txtlname']==NULL)
		{
			$_SESSION['lnamerror']=1;
			header($str4);
		}		
		else
		{
			$lnam=$_POST['txtlname'];
			$_SESSION['lnamevalue']=$lnam;
		}
		
		if($_POST['txtaname']==NULL)
		{
			$_SESSION['anamerror']=1;
			header($str4);
		}		
		else
		{
			$anam=$_POST['txtaname'];
			$_SESSION['anamevalue']=$anam;
		}
		if($_POST['txt_phno']==NULL)
		{
			$_SESSION['phnoerror']=1;
			header($str4);
		}
		else
		{
			$phno=$_POST['txt_phno'];
			$_SESSION['phnovalue']=$phno;
		}
		if($_POST['rdb_gender']==NULL)
		{
			$_SESSION['gendererror']=1;
			header($str4);
		}
		else
		{
			$gender=$_POST['rdb_gender'];
			if($gender=="male")
			{
				$_SESSION['gendervalue']=$gender;
			}
			if($gender=="female")
			{
				$_SESSION['gendervalue']=$gender;
			}
		}	
		if($_POST['emailid']==NULL || $_POST['emailid']=="admin@gmail.com" )
		{
			$_SESSION['emailerror']=1;
			header($str4);
		}
		else
		{
			$email=$_POST['emailid'];
			$_SESSION['emailvalue']=$email;
		}
		
		if($_POST['password']==NULL)
		{
			$_SESSION['passerror']=1;
			header($str4);
		}
		else
		{
			$pass=$_POST['password'];
		}
		if(isset($_POST['gamequestion']))
		{
			$_SESSION['gamequestionvalue']=$_POST['gamequestion'];
			$hob=$_POST['gamequestion'];
			
		}
		
		if(isset($_POST['securityquestion']))
		{
			$_SESSION['securityquestionvalue']=$_POST['securityquestion'];
			$qid=$_POST['securityquestion'];
		}
		if($_POST['question']==NULL)
		{
			$_SESSION['questionerror']=1;
			
			header($str4);
		}
		else
		{
			$question=$_POST['question'];
			$_SESSION['questionvalue']=$question;
		}
		//echo $nam.$lnam.$email.$pass.$gender.$phno,$question,$_POST['securityquestion'];
		if(!($nam==NULL || $lnam==NULL || $hob==NULL ||$anam==NULL || $email==NULL || $pass==NULL || $gender==NULL || $phno==NULL|| $question==NULL ))
		{
				
				$_SESSION['namevalue'];
				$_SESSION['lnamevalue'];
				$_SESSION['anamevalue'];
				$_SESSION['phnovalue'];
				$_SESSION['gendervalue'];
				$_SESSION['emailvalue'];
				$no=0;
			$result=mysqli_query($con,"select max(reg_id) as cid1 from signup_details");
				if($data=mysqli_fetch_array($result))
				{
					$no=$data['cid1'];
					$no=$no+1;
					
				}
				else
				{
				
					$no=1;
				}
				$date1=date('y-m-d');
				$i=0;
				$l=0;
				$m=0;
				$k=0;
				$j=mysqli_query($con,"insert into signup_details values ('$no','$nam','$lnam','$gender','$phno','$hob','$date1')");
				if($j)
				{
					$i=mysqli_query($con,"insert into login values ('$no','$email','$pass')");
					if($i)
					{
						$l=mysqli_query($con,"insert into alias values('$no','$anam')");
						if($l)
						{
	
							$m=mysqli_query($con,"insert into privacy values ('$no','all','all','private','all','all')");
						$k=mysqli_query($con,"insert into usersecurityanswer values ('$no','$qid','$question')");
							if($i && $j && $l && $m  && $k)
							{
								echo"hello";
									$_SESSION['reg_id']=$no;
									$_SESSION['email']=$email;
									$_SESSION['emailcommanusername']=$email;
									header("location:demo1.php");
									
							}
							else
							{
								
								$_SESSION['inserterror']=1;
								header($str4);
							}
								
						}
						else
						{
							$d0=mysqli_query($con,"DELETE from signup_details where reg_id='".$no."'");
							$d=mysqli_query($con,"DELETE from login where reg_id='".$no."'");
							$_SESSION['inserterror']=1;
							header($str4);
						}
					}
					else
					{
						$d1=mysqli_query($con,"DELETE from signup_details where reg_id='".$no."'");
					
							$_SESSION['inserterror']=1;
							header($str4);
							

					}
				}
				else
				{
					
					$_SESSION['inserterror']=1;
					header($str4);
					
				}
				
			}
		}
	
?>