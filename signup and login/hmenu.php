<? ob_start(); ?>
<?php		
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];
		$query=mysqli_query($con,"select * from alias where reg_id='$reg_id'");
		if (!$query) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
		$data=mysqli_fetch_array($query);
		$str=$data['alias_name'];
				
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style-menu.css">
	<style type="text/css">
	.bg-light
	{
	background:none !important;
	}
	</style>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" style="margin-top:96px; background:none">
            <div class="sidebar-header" style="background-image:url(img1/bh.png)">
                <h3><font color="#000000">Welcome  <?php echo $str; ?></font></h3>
            </div>    
            <ul class="list-unstyled components">
          
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" style="background-image:url(img1/gh.jpg); margin-top:-20px;" aria-expanded="false" class="dropdown-toggle" >Your Profile</a>
                    <ul class="list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="profile.php" style="background-image:url(img1/bg.jpg)">Edit Profile Pic</a>
                        </li>
                        <li>
                            <a href="privacy.php" style="background-image:url(img1/bg.jpg)">Privacy</a>
                        </li>
                        <li>
                            <a href="offerdetails.php" style="background-image:url(img1/bg.jpg)">Games Hosted</a>
                        </li>
						<li>
                            <a href="updatemain.php" style="background-image:url(img1/bg.jpg)">Update Personal Info.</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" style="background-image:url(img1/gh.jpg);" class="dropdown-toggle">Friends</a>
                    <ul class="list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="addfriend.php"style="background-image:url(img1/bg.jpg)">Add Friends</a>
                        </li>
                        <li>
                            <a href="personalmessage.php" style="background-image:url(img1/bg.jpg)">Messages</a>
                        </li>
                        <li>
                            <a href="friendlist.php" style="background-image:url(img1/bg.jpg)">Friends List</a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="#demoSubmenu" data-toggle="collapse" aria-expanded="false" style="background-image:url(img1/gh.jpg);" class="dropdown-toggle">Games Details</a>
                    <ul class="list-unstyled" id="demoSubmenu">
                        <li>
                            <a href="achievments.php"style="background-image:url(img1/bg.jpg)">Achievements</a>
                        </li>
                        <li>
                            <a href="ratehoster.php" style="background-image:url(img1/bg.jpg)">Rate Game Hosters</a>
                        </li>
						<li>
                            <a href="rateplayer.php" style="background-image:url(img1/bg.jpg)">Rate Players</a>
                        </li>
                        <li>
                            <a href="upcomingevents.php" style="background-image:url(img1/bg.jpg)">Upcoming Events</a>
                        </li>
                    </ul>
                </li>
<li>
                    <a href="#demo1Submenu" data-toggle="collapse" aria-expanded="false" style="background-image:url(img1/gh.jpg);" class="dropdown-toggle">About PlayMap</a>
                    <ul class="collapse list-unstyled" id="demo1Submenu">
                        <li>
                            <a href="aim1.php" style="background-image:url(img1/bg.jpg)">Aim of PlayMap</a>
                        </li>
                        <li>
                            <a href="contactus1.php" style="background-image:url(img1/bg.jpg)">Contact Us</a>
                        </li>
                        <li>
                            <a href="howitworks1.php" style="background-image:url(img1/bg.jpg)">How it Works?</a>
                        </li>
                    </ul>
                </li>           

            
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top:100px; background:none">
                <div class="container-fluid" style="background:none">

                    <button type="button" id="sidebarCollapse" class="btn btn-info" style="margin-left: -29px;
    margin-right: 0px;
    margin-top: -38px;" style="background:none">
                        <i class="fas fa-align-left" style="background:none"></i>
                        <span></span>
                    </button>
                    </div>
                
            </nav>

            

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
         $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
									
            });

        });
    </script>
</body>

</html>
<? ob_flush(); ?>