<? ob_start(); ?>
<html>
<head>
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
                <h3><font color="#000000">Welcome to PlayMap</font></h3>
            </div>    
            <ul class="list-unstyled components">
          
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" style="background-image:url(img1/gh.jpg); margin-top:-20px;" aria-expanded="false" class="dropdown-toggle" >Add Information</a>
                    <ul class="list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="state.php" style="background-image:url(img1/bg.jpg)">Add State</a>
                        </li>
                        <li>
                            <a href="city.php" style="background-image:url(img1/bg.jpg)">Add City</a>
                        </li>
                        <li>
                            <a href="area.php" style="background-image:url(img1/bg.jpg)">Add Area</a>
                        </li>
						 <li>
                            <a href="game.php" style="background-image:url(img1/bg.jpg)">Add Game</a>
                        </li>
						<li>
                            <a href="adduser.php" style="background-image:url(img1/bg.jpg)">Add User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" style="background-image:url(img1/gh.jpg);" class="dropdown-toggle">Regulations</a>
                    <ul class="list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="report1.php"style="background-image:url(img1/bg.jpg)">Report</a>
                        </li>
                        <li>
                            <a href="trust2.php" style="background-image:url(img1/bg.jpg)">Trust</a>
                        </li>
                        <li>
                            <a href="insurance2.php" style="background-image:url(img1/bg.jpg)">Insurance</a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="#demoSubmenu" data-toggle="collapse" aria-expanded="false" style="background-image:url(img1/gh.jpg);" class="dropdown-toggle">About Gaming</a>
                    <ul class="list-unstyled" id="demoSubmenu">
                         <li>
                            <a href="aim2.php" style="background-image:url(img1/bg.jpg)">Info Of PlayMap</a>
                        </li>
                        <li>
                            <a href="contactus2.php" style="background-image:url(img1/bg.jpg)">Contact Us</a>
                        </li>
                        <li>
                            <a href="howitworks2.php" style="background-image:url(img1/bg.jpg)">How it works?</a>
                        </li>
                    </ul>
                </li>
<li>

            
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