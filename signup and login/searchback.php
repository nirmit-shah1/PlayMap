<?php
ob_start();
session_start();
	include_once("toptemplate1.php");
	include_once("hmenu.php");
	include_once("../connection.php");
	if(isset($_SESSION['emailcommanusername']))
	{
		$reg_id=$_SESSION['reg_id'];
		$a=$_SESSION['reg_id'];
	?>
	<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
		<title>Search page</title>	
				 <style type="text/css">
	
				#dv1, #dv0{
					border: 1px #ccc solid;
						margin: auto;
	
				}
			   
				/*downloaded from http://devzone.co.in*/
			</style>
		   <style>
	
				/****** Rating Starts *****/
			   @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
	
				fieldset, label { margin: 0; padding: 0; }
				body{ }
				h1 {  }
	
				.rating { 
					border: none;
					float: left;
				}
	
				.rating > input { display: none; } 
				.rating > label:before { 
					margin: 5px;
					font-size: 1.25em;
					font-family: FontAwesome;
					display: inline-block;
					content: "\f005";
				}
	
				.rating > .half:before { 
					content: "\f089";
					position: absolute;
				}
	
				.rating > label { 
					color: #ddd; 
					float: right; 
				}
				
				table td{
					width:10%;	
				}
	
				.rating > input:checked ~ label, 
				.rating:not(:checked) > label:hover,  
				.rating:not(:checked) > label:hover ~ label { color: #FFD700;  }
	
				.rating > input:checked + label:hover, 
				.rating > input:checked ~ label:hover,
				.rating > label:hover ~ input:checked ~ label, 
				.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     
			</style>
			
		
						<!-- Demo 2 start -->
		   
		<script>
							$(document).ready(function () {
								$("#demo2 .stars").click(function () {
									alert($(this).val());
									$(this).attr("checked");
								});
							});
						</script>
	</head>
	<html>
					<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box style-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Details</font>
			</h1>

	<?php
		$reg_final=0;
		$mid_final=0;
		$date2=date('yy-mm-dd');
		if(isset($_GET['submit']) || isset($_SESSION['searchvalue']))
		{
			if(isset($_SESSION['searchvalue']))
			{
				$t=$_SESSION['tovalue'];
			}
			else
			{
				$a=$_SESSION['reg_id'];
				if($_GET['txtto']== NULL)
				{
					$_SESSION['toerror']=1;
					header("location:demo2.php");
				}
				else
				{
					$t=$_GET['txtto'];
					$_SESSION['tovalue']=$t;
				}
			}
			if(!($t==NULL))
			{
				$exp=$_GET['exp'];
				unset($_SESSION['searchvalue']);
				$sql1="select * from routedetails where destination LIKE '%".$t."%' AND routedetails.reg_id!='".$reg_id."'" ;
				$rowcount=0;
				$result1=mysqli_query($con,$sql1);
				if($result1)
				{
					$rowcount=mysqli_num_rows($result1);
				}	
				while($row0=mysqli_fetch_array($result1))
				{
					$reg_idd=$row0['reg_id'];
					$mid=$row0['mid'];
					$sqlinner=mysqli_query($con,"select * from membergamingdetails where reg_id='".$reg_idd."' AND mid='".$mid."' AND exp='".$exp."'");
				while($row22=mysqli_fetch_array($sqlinner))
				{
					$reg_final=$row22['reg_id'];
					$mid_final=$row22['mid']; 	
					echo "<table border='0' cellpadding='10' class='table-borderless'>";
				 	if($rowcount>=1)
					{
							$sq=mysqli_query($con,"select * from typeofgame  where reg_id='".$reg_final."' AND mid='".$mid_final."'");
							$ro=mysqli_fetch_array($sq);
							$date1=$ro['gamedate'];
							$date2=date('Y-m-d');			
						if($date1 >= $date2 )
							{
					
							if(!($reg_final==$a))
							{		
								echo "<tr>";
								$sql2=mysqli_query($con,"select * from images  where reg_id='".$reg_final."' ");
								$row2=mysqli_fetch_array($sql2);
								$sql3=mysqli_query($con,"select * from signup_details  where reg_id='".$reg_final."'");
								$row3=mysqli_fetch_array($sql3);
								$sql4=mysqli_query($con,"select * from typeofgame  where reg_id='".$reg_final."' AND mid='".$mid_final."'");
								$row4=mysqli_fetch_array($sql4);
								
								echo "<td><img align='middle'  src='images/".$row2[1]."' height='250px' width='350px' ></td></tr>";		
								$sql5=mysqli_query($con,"select * from rating where pid='".$reg_final."'");
								$rating=0;
								$count=1;
								while($row5=mysqli_fetch_array($sql5))
								{
								echo"<h1>sdgsgsg</h1>";	
								$value=$row5['rate'];
								$value1=(int)$value;
								$rating=($value1+$rating)/$count;
								$count++;
	
								}
								echo "<tr><td>Name of Hoster:-</td>";
								echo "<td >".$row3['fname'];
								echo "&nbsp;".$row3['lname']."</td></tr>";	
								
								echo "<tr><td>Venue:-</td><td>".$row0[3]."</td></tr>";	
								echo "<tr><td>Game Date:-</td><td>".$row4[3]."</td></tr>";
								echo "<tr><td>Game Time:-</td><td>".$row4[4]."</td></tr>";
							 echo "<tr><td>Ratings:-</td><td>";
?>
							

							<?php if($rating <= 5 && $rating >4.5)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" type="radio" id="star5" name="rating" value="5" checked="checked" readonly="true" />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" id="star4half" readonly="true" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" name="rating" readonly="true" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" name="rating" value="3.5" readonly="true" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" readonly="true" name="rating" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" readonly="true" value="2.5"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" id="star2" name="rating" readonly="true" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" name="rating" value="1.5" readonly="true" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" readonly="true" type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							 else if($rating>4.0 && $rating <= 4.5   )
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" type="radio" readonly="true" id="star5" name="rating" value="5" \ />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" id="star4half" readonly="true" name="rating" value="4.5" checked="checked" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star4" name="rating" readonly="true" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star3half" name="rating" value="3.5" readonly="true" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star3" name="rating" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" readonly="true" name="rating" value="2.5"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" id="star2" name="rating" readonly="true" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" name="rating" readonly="true" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" id="star1" name="rating" value="1" readonly="true" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" name="rating" value="0.5" readonly="true" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating>3.5 && $rating <=4.0)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input readonly="true" class="stars" type="radio" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star4" name="rating" value="4" checked="checked"  />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" readonly="true" name="rating" value="3.5" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" name="rating" readonly="true" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" value="2.5" readonly="true"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" readonly="true" type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating>3.0 && $rating <= 3.5)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input readonly="true" class="stars" type="radio" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star4half" name="rating" value="4.5"  />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star4" name="rating" value="4"  />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" readonly="true" name="rating" value="3.5" checked="checked"/>
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" name="rating" readonly="true" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" value="2.5" readonly="true"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" readonly="true" type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating>2.5 && $rating <= 3.0)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" type="radio" readonly="true" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" id="star4half" readonly="true" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" name="rating" readonly="true" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" name="rating" value="3.5" readonly="true"  />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star3" name="rating" value="3" checked="checked"/>
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star2half" name="rating" value="2.5"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" readonly="true" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" id="star1" name="rating" readonly="true" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" name="rating" value="0.5" readonly="true" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating>2.0 && $rating <= 2.5)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" readonly="true" type="radio" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" readonly="true" name="rating" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" readonly="true" name="rating" value="3.5" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" name="rating" readonly="true" value="3"  />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" readonly="true" value="2.5" checked="checked" />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" id="star2" name="rating" value="2" readonly="true" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" name="rating" value="1.5" readonly="true"/>
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" readonly="true" type="radio" id="starhalf" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating > 1.5 && $rating <= 2.0)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" type="radio" readonly="true" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" id="star4half" readonly="true" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" name="rating" value="4" readonly="true" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" name="rating" value="3.5" readonly="true"/>
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star3" name="rating" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star2half" name="rating" value="2.5"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star2" name="rating" value="2"  checked="checked"/>
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" readonly="true" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" id="star1" name="rating" readonly="true" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" name="rating" value="0.5" readonly="true" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating >1 && $rating <= 1.5)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" readonly="true" type="radio" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" readonly="true" name="rating" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" name="rating" readonly="true" value="3.5" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" name="rating" value="3" readonly="true" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" value="2.5" readonly="true"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star2" name="rating" value="2"  />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star1half" name="rating" value="1.5" checked="checked"  />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" readonly="true" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							else if($rating >0.5 && $rating <= 1.0)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" readonly="true" type="radio" id="star5" name="rating" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star4half" name="rating" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" readonly="true" name="rating" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" readonly="true" name="rating" value="3.5" />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input class="stars" type="radio" id="star3" name="rating" readonly="true" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" type="radio" id="star2half" name="rating" value="2.5" readonly="true"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star1half" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star1" name="rating" value="1"  checked="checked" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" readonly="true" name="rating" value="0.5" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							<?php
							}
							
							else if($rating >0 && $rating == 0.5)
							{?>
							<form action="rating.php" method="post">					
							<fieldset id='demo2' class="rating">
							<input class="stars" type="radio" id="star5" name="rating" readonly="true" value="5"  />							
							<label class = "full" for="star5" title="Awesome - 5 stars"></label>
							<input class="stars" type="radio" id="star4half" name="rating" readonly="true" value="4.5" />
							<label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
							<input class="stars" type="radio" id="star4" name="rating" readonly="true" value="4" />
							<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
							<input class="stars" type="radio" id="star3half" name="rating" value="3.5" readonly="true"  />
							<label class="half" for="star3half" title="Meh - 3.5 stars"></label>
							<input readonly="true" class="stars" type="radio" id="star3" name="rating" value="3" />
							<label class = "full" for="star3" title="Meh - 3 stars"></label>
							<input class="stars" readonly="true" type="radio" id="star2half" name="rating" value="2.5"  />
							<label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
							<input class="stars" type="radio" readonly="true" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
							<input class="stars" type="radio" id="star1half" readonly="true" name="rating" value="1.5" />
							<label class="half" for="star1half" title="Meh - 1.5 stars"></label>
							<input class="stars" type="radio" id="star1" name="rating" readonly="true" value="1" />
							<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
							<input class="stars" type="radio" id="starhalf" name="rating" value="0.5" readonly="true"  checked="checked" />
							<label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	
						</fieldset></form>
							
						
							
						
							<?php
							}
							else if($rating == 0)
							{
							
								echo"the Driver has not been rated till now</td></tr>";
							}
							
								echo "<tr><td><a class='btn btn-danger' href='viewdetails.php?pid=".$reg_final."&mid=".$mid_final."'>view details>></a></td>";	
								echo "</tr>";
								echo"<tr>";
								echo"<td><hr></td>";
								echo"<td><hr></td>";
								echo"<td><hr></td>";
								echo"<td><hr></td>";		
								echo"</tr>";
						  }
			    }
					
		    	}
			  else
    					{	
		     				echo "No game has been hosted for this search combination";
	     				}					
	
			}	
			}	
			
		
		
	}
	
		?>
	<!--	<img src="img/Exclamation.png">No Ride Has Been Found On This Route-->
		
	<?php
		
		}
		
		?>	
	
		</table>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
                        	 $("input").prop('disabled', true);

                        });
</script>
		</body>
		</div>
		</html> 
<?php
}
else
	header("location:../index.php");
?>