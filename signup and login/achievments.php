<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];

/*		function noofuser()
		{
		global $con;
		$sql="select * from signup_details";
		$result=mysqli_query($con,$sql);
		echo "<font size='+2'>". mysqli_num_rows($result)."</font>";
		}
*/	
function gameoffernow()
{
global $con;
global $reg_id;
$sql="select * from routedetails where reg_id='".$reg_id."' ";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";
}

function noofratingtohoster()
{
global $con;
global $reg_id;
$sql="select * from rating where hid='".$reg_id."'";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";

}
function noofratingtoplayer()
{
global $con;
global $reg_id;
$sql="select * from prating where pid='".$reg_id."'";
$result=mysqli_query($con,$sql);
echo"<font size='+2'>". mysqli_num_rows($result)."</font>";

}



?>
    <html>

    <head>
        <style type="text/css">
            .card-text{
            
            			color:#4286f4;
            			font-weight: bold;
            		}
            		.card-body{
            			background-color: #b8ffa8;
            		}
        </style>
        <link href="style-box.css" rel="stylesheet" type="text/css">
        <title>Untitled Document</title>
    </head>

    <body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
        <div class="white-box">
            <h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">
                <font color="#000000">&nbsp;&nbsp;Achievment</font>
            </h1>

            <div class="container">
                <div class="row">

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text"> Users Register till now on The Site</p>
                                <a href="#" class="card-link btn btn-warning"><?php gameoffernow();?></a>
                                <a href="moredetailsuser.php?gameid=<?php echo $reg_id;?>" class="card-link btn btn-primary">Get Details</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">No. Of Ratings
And Comment As Hoster Till Now</p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
    <a href="#" class="card-link btn btn-warning">	<?php noofratingtohoster(); ?></a>


                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text">No. Of Ratings
						And Comment As Player Till Now</p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	    <a href="#" class="card-link btn btn-warning">	<?php noofratingtoplayer(); ?></a>

                            </div>
                        </div>
                    </div>



                </div>

<!--                <div class="row mt-3">

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text"> Users Register till now on The Site</p>
                                <a href="#" class="card-link btn btn-warning">	aa</a>
                                <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text"> Users Register till now on The Site</p>
                                <a href="#" class="card-link btn btn-warning">	aa</a>
                                <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text"> Users Register till now on The Site</p>
                                <a href="#" class="card-link btn btn-warning">	aa</a>
                                <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
                            </div>
                        </div>
                    </div>


                </div>-->

                <!-- 	<div class="row mt-3">
		
					<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="card" style="width: 18rem;">
							  <div class="card-body">
							    <p class="card-text"> Users Register till now on The Site</p>
							    <a href="#" class="card-link btn btn-warning">	aa</a>
							    <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
							  </div>
							</div>
						</div>
						
							<div class="col-sm-4 col-md-4 col-lg-4">
								<div class="card" style="width: 18rem;">
							  <div class="card-body">	
							    <p class="card-text"> Users Register till now on The Site</p>
							    <a href="#" class="card-link btn btn-warning">	aa</a>
							    <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
							  </div>
							</div>
						</div>

							<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="card" style="width: 18rem;">
							  <div class="card-body">
							    <p class="card-text"> Users Register till now on The Site</p>
							    <a href="#" class="card-link btn btn-warning">	aa</a>
							    <a href="usertillnow.php" class="card-link btn btn-primary">Get Details</a>
							  </div>
							</div>
						</div>
				
			</div>
		 --><br><br>
            </div>
        </div>

        <?php			
	}
	else
	{
		header("location:../index.php");		
	}

?>

    </body>

    </html>