<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
		$email=$_SESSION['emailcommanusername'];
		$departuredate="";
?>
<html>
	<body>
		<body>
	<?php
		if(isset($_GET['btn_next']))
		{
			if($_GET['source']==NULL)
			{
				$_SESSION['sourceerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$source=$_GET['source'];
				$_SESSION['sourcevalue']=$source;
			}
			if($_GET['destination']==NULL)
			{
				$_SESSION['destinationerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$destination=$_GET['destination'];
				$_SESSION['destinationvalue']=$destination;
			}
			if($_GET['intermediatedestination1']==NULL)
			{
				$_SESSION['intermediated1error']=1;
				header("location:demo1.php");
			}
			else
			{
				$intermediated1=$_GET['intermediatedestination1'];
				$_SESSION['intermediated1value']=$intermediated1;
			}
			if($_GET['intermediatedestination2']==NULL)
			{
				$_SESSION['intermediated2error']=1;
				header("location:demo1.php");
			}
			else
			{
				$intermediated2=$_GET['intermediatedestination2'];
				$_SESSION['intermediated2value']=$intermediated2;
			}
			if($_GET['rdb_selectday']==NULL)
			{
				$_SESSION['rdb_selectdayerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$gametype=$_GET['rdb_selectday'];
				$_SESSION['gametypevalue']=$gametype;
				if($gametype=="multipleday")
				{
					$_SESSION['day']=$_GET['days'];
				}
			}
			if($_GET['departuredate']==NULL)
			{
				$_SESSION['departuredateerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$departuredate=$_GET['departuredate'];
				$_SESSION['departuredatevalue']=$departuredate;
			}
		
			if($_GET['timehour']==NULL)
			{
				$_SESSION['timehourerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$timehour=$_GET['timehour'];
				$_SESSION['timehourvalue']=$timehour;
			}
			if($_GET['timeminute']==NULL)
			{
				$_SESSION['timeminuteerror']=1;
				header("location:demo1.php");
			}
			else
			{
				$timeminute=$_GET['timeminute'];
				$_SESSION['timeminutevalue']=$timeminute;
			}
			if(!($source==NULL || $destination==NULL || $intermediated1==NULL || $intermediated2==NULL || $gametype==NULL|| $departuredate==NULL || $timehour==NULL|| $timeminute==NULL))
			{		
				$_SESSION['gamesuccess']=1;
				header("location:membergamingdetails.php");	
			}
			else
				header("location:demo1.php");
		}
		/*
		


					 code for Member Route Details


		
		*/
		
		if(isset($_GET['btn_publisoffer']))
		{	
			if(isset($_SESSION['sourcevalue']))
				$source=$_SESSION['sourcevalue'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['destinationvalue']))
				$destination=$_SESSION['destinationvalue'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['intermediated1value']))
				$intermediated1=$_SESSION['intermediated1value'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['intermediated2value']))
				$intermediated2=$_SESSION['intermediated2value'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['gametypevalue']))
				$gametype=$_SESSION['gametypevalue'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['departuredatevalue']))
				$departuredate=$_SESSION['departuredatevalue'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['timehourvalue']))
				$timehour=$_SESSION['timehourvalue'];
			else
				header("location:demo1.php");
			if(isset($_SESSION['timeminutevalue']))
				$timeminute=$_SESSION['timeminutevalue'];
			else
				header("location:demo1.php");	
		
		if(!($source==NULL || $destination==NULL || $intermediated1==NULL || $intermediated2==NULL || $gametype==NULL|| $departuredate==NULL || $timehour==NULL|| $timeminute==NULL))
			{		
				
			$price=$_GET['qty'];
			$space=$_GET['spaceavailable'];
			$exp=$_GET['exp'];
			$wait=$_GET['wait'];
			$delay=$_GET['delay'];
			$time1=$timehour." ".$timeminute;
		echo $source,$destination,$intermediated1,$intermediated2,$price,$space,$exp,$wait,$delay,$gametype,$departuredate,$timehour,$timeminute,$time1;
				$query=mysqli_query($con,"select max(mid) as mid1 from routedetails");
				if($data=mysqli_fetch_array($query))
				{
					$mid1=$data['mid1'];
					$mid1+=1;
				}
				$query1=mysqli_query($con,"select max(rid) as rid1 from typeofgame");
				if($data1=mysqli_fetch_array($query1))
				{
					
					$rid1=$data1['rid1'];
					$rid1++;
				}
				//echo $reg_id,$mid1,$source,$destination,$intermediated1,$intermediated2,$rid1;
					//echo "<br>";
					//echo $triptype,$departuredate."<br>".$time1,$price,$seats,$exp,$wait,$delay;
				
				
				if(isset($_SESSION['day']))
				{
					
					$day=$_SESSION['day'];
					echo $day."<br>";
					echo $reg_id,$mid1,$source,$destination,$intermediated1,$intermediated2,$rid1;
					echo "<br>";
					echo $gametype,$departuredate."<br>".$time1,$price,$space,$exp,$wait,$delay;
					if($day>1)
					{
					
						$insert1=mysqli_query($con,"insert into routedetails values('$reg_id','$mid1','$source','$destination','$intermediated1','$intermediated2')");
						$insert2=mysqli_query($con,"insert into typeofgame values ('$reg_id','$mid1','$gametype','$departuredate','$time1','$rid1')");								
						$insert3=mysqli_query($con,"insert into membergamingdetails values('$reg_id','$mid1','$price','$space','$exp','$wait','$delay')");
						$mid1++;
						while($day!=1)
						{

							$a=$departuredate;
							$m=substr($a,5,2);
							$d=substr($a,8,2);
							$y=substr($a,0,4);
							$num = cal_days_in_month(CAL_GREGORIAN, $m, $y); 
							if($d == 30 && $num == 30)
							{
								if($m>9)
								{
									$m++;
									$b=1;
									$d="0".$b;
									$departuredate= $y."-".$m."-".$d;
								}
								else
								{
									$m++;
									$m="0".$m;
									$b=1;
									$d="0".$b;
									$departuredate= $y."-".$m."-".$d;
								}
							}
							elseif($d == 31 && $num == 31)
							{
								if($m==12)
								{
									$m=1;
									$b=1;
									$d="0".$b;
									$y++;
									$departuredate= $y."-".$m."-".$d;
								}
								else
								{
									if($m>9)
									{		
										$m++;
										$b=01;
										$d="0".$b;
										$departuredate= $y."-".$m."-".$d;
									}
									else
									{
										$m++;
										$m="0".$m;
										$b=1;
										$d="0".$b;
										$departuredate= $y."-".$m."-".$d;
									}
								}
							}
							elseif($d == 30 && $num == 31)
							{
								if($m==12)
								{
									$b=31;
									$d=$b;
									$departuredate= $y."-".$m."-".$d;
									$y++;
								}
								else
								{
									$b=31;
									$d=$b;
									$departuredate= $y."-".$m."-".$d;
								}
							}
							elseif($d == 29 && $num == 29)
							{
								if($m>9)
								{	
									$b=1;
									$d="0".$b;
									$m++;		
									$departuredate= $y."-".$m."-".$d;
								}
								else
								{
									$b=1;
									$d="0".$b;
									$m++;
									$m="0".$m;
									$departuredate= $y."-".$m."-".$d;
								}
							}
							elseif($d == 28 && $num == 29)
							{
								$b=29;
								$d=$b;
								$departuredate= $y."-".$m."-".$d;
							}
							elseif($d == 28 && $num == 28)
							{
								if($m>9)
								{
									$b=1;
									$d="0".$b;
									$m++;
									$departuredate= $y."-".$m."-".$d;
								}
								else
								{
									$b=1;
									$d="0".$b;
									$m++;
									$m="0".$m;
									$departuredate= $y."-".$m."-".$d;
								}
							}
							elseif($d == 27 && $num == 28)
							{
								$b=28;
								$d=$b;
								$departuredate= $y."-".$m."-".$d;
							}
							else
							{	
								if($d>8)
								{
									$b=$d+1;
									$d=$b;
									$departuredate=$y."-".$m."-".$d;
								}
								else
								{
									$b=$d+1;
									$d="0".$b;
									$departuredate=$y."-".$m."-".$d;
								}
							}
							//echo $departuredate."<br>";
							$insert1=mysqli_query($con,"insert into routedetails values('$reg_id','$mid1','$source','$destination','$intermediated1','$intermediated2')");
							$insert2=mysqli_query($con,"insert into typeofgame values ('$reg_id','$mid1','$gametype','$departuredate','$time1','$rid1')");								
							$insert3=mysqli_query($con,"insert into membergamingdetails values('$reg_id','$mid1','$price','$space','$exp','$wait','$delay')");
							$mid1++;
							$day--;
													
						}
					}
				}
				else
				{
					//echo $reg_id,$mid1,$source,$destination,$intermediated1,$intermediated2,$rid1;
					//echo "<br>";
					//echo $triptype,$departuredate."<br>".$time1,$price,$seats,$exp,$wait,$delay;
					$insert1=mysqli_query($con,"insert into routedetails values('$reg_id','$mid1','$source','$destination','$intermediated1','$intermediated2')");
					$insert2=mysqli_query($con,"insert into typeofgame values ('$reg_id','$mid1','$gametype','$departuredate','$time1','$rid1')");
					echo $reg_id,$mid1,$price,$space,$exp,$wait,$delay;								
					$insert3=mysqli_query($con,"insert into membergamingdetails values('$reg_id','$mid1','$price','$space','$exp','$wait','$delay')");
					 $result=mysqli_affected_rows($con);
					mysqli_query($con,"COMMIT");
				}
				if($insert1 && $insert2)
				{
					header("location:membergamingdetails.php");				
				}
				else
				{
				
			    	header("location:demo1.php");					
				}
			
			if($insert1 && $insert2 && $insert3)
			{
					session_destroy();
					session_start();
					$_SESSION['emailcommanusername']=$email;
					$_SESSION['reg_id']=$reg_id;
					header("location:offerpublished.php");
				
			}
			else
			{	
				header("location:membergamingdetails.php");
			}
		}
		else
			header("location:demo1.php");
	}
			//echo"<h1>hello</h1>";//echo"<h1>hello</h1>";//					
			//echo $source,$destination,$intermediated1,$intermediated2,$price,$seats,$exp,$wait,$delay,$triptype,$date,$timehour,$timeminute;
		
		
		//echo"<h1>hello</h1>";//header("location:membertravellingdetail.php");
		/*
		

					
					code for update member route details



		*/
		
	if(isset($_SESSION['rid']))
	{

		$rid=$_SESSION['rid'];
		if(isset($_GET['btn_updatenext']))
		{
			if($_GET['source']==NULL)
			{
				$_SESSION['sourceerror']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$source=$_GET['source'];
				$_SESSION['sourcevalue']=$source;
			}
			if($_GET['destination']==NULL)
			{
				$_SESSION['destinationerror']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$destination=$_GET['destination'];
				$_SESSION['destinationvalue']=$destination;
			}
			if($_GET['intermediatedestination1']==NULL)
			{
				$_SESSION['intermediated1error']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$intermediated1=$_GET['intermediatedestination1'];
				$_SESSION['intermediated1value']=$intermediated1;
			}
			if($_GET['intermediatedestination2']==NULL)
			{
				$_SESSION['intermediated2error']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$intermediated2=$_GET['intermediatedestination2'];
				$_SESSION['intermediated2value']=$intermediated2;
			}
			/*if($_GET['rdb_selectday']==NULL)
			{
				$_SESSION['rdb_selectdayerror']=1;
				echo"<h1>hello</h1>";//echo"<h1>hello</h1>";//header("location:demo1.php");
			}
			else
			{
				$triptype=$_GET['rdb_selectday'];
				$_SESSION['triptypevalue']=$triptype;
			}*/
			if($_GET['departuredate']==NULL)
			{
				$_SESSION['departuredateerror']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$departuredate=$_GET['departuredate'];
				$_SESSION['departuredatevalue']=$departuredate;
			}
		
			if($_GET['timehour']==NULL)
			{
				$_SESSION['timehourerror']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$timehour=$_GET['timehour'];
				$_SESSION['timehourvalue']=$timehour;
			}
			echo $_GET['timehour'];
			if($_GET['timeminute']==NULL)
			{
				$_SESSION['timeminuteerror']=1;
				header("location:memberroutedetailsupdate.php");
			}
			else
			{
				$timeminute=$_GET['timeminute'];
				$_SESSION['timeminutevalue']=$timeminute;
			}
			if(!($source==NULL || $destination==NULL || $intermediated1==NULL || $intermediated2==NULL || $departuredate==NULL || $timehour==NULL|| $timeminute==NULL))
			{		
				
				header("location:membergamingdetailupdate.php");	
			}
			else
				header("location:memberroutedetailsupdate.php");
		}




		if(isset($_GET['btn_updateoffer']))
		{
			$midedit=$_SESSION['midedit'];	
			if(isset($_SESSION['sourcevalue']))
				 $source=$_SESSION['sourcevalue'];
			else
				header("location:memberroutedetailsupdate.php");
			if(isset($_SESSION['destinationvalue']))
				 $destination=$_SESSION['destinationvalue'];
			else
				header("location:memberroutedetailsupdate.php");
			if(isset($_SESSION['intermediated1value']))
				 $intermediated1=$_SESSION['intermediated1value'];
			else
				header("location:memberroutedetailsupdate.php");
			if(isset($_SESSION['intermediated2value']))
				 $intermediated2=$_SESSION['intermediated2value'];
			else
				header("location:memberroutedetailsupdate.php");/*
			if(isset($_SESSION['triptypevalue']))
				echo $triptype=$_SESSION['triptypevalue'];
			else
				echo"<h1>hello</h1>";//echo"<h1>hello</h1>";//header("location:demo1.php");*/
			if(isset($_SESSION['departuredatevalue']))
				 $departuredate=$_SESSION['departuredatevalue'];
			else
				header("location:memberroutedetailsupdate.php");
			if(isset($_SESSION['timehourvalue']))
				 $timehour=$_SESSION['timehourvalue'];
			else
				header("location:memberroutedetailsupdate.php");
			if(isset($_SESSION['timeminutevalue']))
				 $timeminute=$_SESSION['timeminutevalue'];
			if(!empty($source) || !empty($destination) || !empty($intermediated1) || !empty($intermediated2) || !empty($departuredate)|| !empty($timehour) || !empty($timeminute ))
			{
				$price=$_GET['qty'];
				$space=$_GET['spaceavailable'];
				$exp=$_GET['exp'];
				$wait=$_GET['wait'];
				$delay=$_GET['delay'];
				$time1=$timehour." ".$timeminute;
				//echo $rid."<BR>".$source,$destination,$intermediated1,$intermediated2,$price,$seats,$exp,$wait,$delay,$departuredate,$timehour,$timeminute,$time1;
				$query=mysqli_query($con,"select max(mid) as mid1 from routedetails");
				if($data=mysqli_fetch_array($query))
				{
					$mid1=$data['mid1'];
					$mid1+=1;
				}
				$query1=mysqli_query($con,"select mid from typeofgame where rid=".$rid." order by mid asc ");
				mysqli_query($con,"update typeofgame set gamedate='$departuredate' where mid = $midedit");	
				while($data1=mysqli_fetch_array($query1))
				{
					//echo $data1['mid'];
					$insert1=mysqli_query($con,"update routedetails set source='$source',destination='$destination',intermediatedestination1='$intermediated1',intermediatedestination2='$intermediated2' where mid=".$data1['mid']);
					$insert2=mysqli_query($con,"update typeofgame set gametime='$time1' where mid=".$data1['mid']);								
					$insert3=mysqli_query($con,"update `membergamingdetails` set `priceperplayer`='$price',`spaceavailable`='$space',`exp`='$exp',`wait`='$wait',`delay`='$delay' where `mid`=".$data1['mid']);
				}
				if($insert1 && $insert2)
				{
					header("location:membergamingdetailupdate.php");				
				}
				else
					header("location:memberroutedetailsupdate.php");
				if($insert1 && $insert2 && $insert3)
				{
				
					session_start();
					$_SESSION['midedit']=$midedit;
					$_SESSION['reg_id']=$reg_id;
					$_SESSION['emailcommanusername']=$email;
					$_SESSION['updatesuccess']=1;
					header("location:offerpublished.php");
				}
				else
					header("location:membergamingdetailupdate.php");
			}
			else
				header("location:memberroutedetailsupdate.php");					
			//echo $source,$destination,$intermediated1,$intermediated2,$price,$seats,$exp,$wait,$delay,$triptype,$date,$timehour,$timeminute;
		}	
	}
	?>
</body>

	
</html>
<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>