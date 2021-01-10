<?php

include_once("../connection.php");

?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css1/style.css">

 
</head>
  <body>
  <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-image:url(img1/bg.jpg); background-repeat:no-repeat;background-size: 1800px;">
    <a class="navbar-brand" style="margin-bottom:12px; padding-top:10px; font-size:27px" href="#">PlayMap</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse" >
   
      <ul class="navbar-nav mr-auto" align="right">
   
        <li class="nav-item active" style="font-size:24px;">
          <a class="nav-link" href="profile.php">Home<span class="sr-only"></span></a>
        </li>
   
        <li class="nav-item" style="font-size:24px;">
          <a class="nav-link" href="demo1.php">Host Game</a>
        </li>
   
        <li class="nav-item" style="font-size:24px;">
          <a class="nav-link" href="demo2.php">Let's Play </a>
        </li>
        <li class="nav-item" style="font-size:24px;">
		          <a class="nav-link " href="notification.php">Notification</a>
			<?php
			$_SESSION['notification']=1;
			if(isset($_SESSION['notification']))
			{
		
				$nmsg=0;
					$receiverid=$_SESSION['reg_id'];	
					$query=mysqli_query($con,"select * from friend_request where rid='".$receiverid."'");
					if(mysqli_num_rows($query)>=1)
					{
						while($data=mysqli_fetch_array($query))
						{
							if($data['status']=="pending")
								$nmsg++;
						}
					}
						if($nmsg==0)
						{
						}
						elseif($nmsg>0)
						{
						echo "<p align='center' style='background-color:#FF0000;width:20px; height:15px; padding-bottom:30px; margin-left:110px; margin-top:-68px;'><font size=+2 color='#FFFFFF'>".$nmsg."</p>";}
				
				}
			
					?>

        </li>
   
          <li class="nav-item" style="font-size:24px;">
          <a class="nav-link " href="logout.php" align="right">Logout</a>
        </li>
   

      </ul>
   
      
    </div>
  </nav>
</header>
</body>
</html>

