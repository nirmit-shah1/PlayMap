<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <style type="text/css">
 	.card-body{
 		background-color:#6C3B7E;
 		color: white;
 	}
 	.card-pad{
 		padding: 4%;
 	}
 	
 </style> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
	<title>Play Map | Home</title>
 
</head>
  <body style="background-color: #000;background-image:url(img/bh.png);
		background-size: cover;
		background-position: top center; ">
  <header >

      

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top " style="background-image:url(img/bg.jpg); background-repeat:no-repeat;background-size: 1800px;">
    <a class="navbar-brand" style="margin-bottom:12px; padding-top:10px; font-size:27px" href="#">PlayMap</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse" >
   
      <ul class="navbar-nav mr-auto" align="right">
   
        <li class="nav-item active" style="font-size:24px;">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
   
        <li class="nav-item" style="font-size:24px;">
          <a class="nav-link" href="signup and login/login.php?uinfo=1">Host Game</a>
        </li>
   
        <li class="nav-item" style="font-size:24px;">
          <a class="nav-link" href="signup and login/login.php?uinfo=2">Let's Play </a>
        </li>
        <li class="nav-item" style="font-size:24px;">
          <a class="nav-link " href="signup and login/howitworks.php">How It Works ?</a>
        </li>
   
          <li class="nav-item" style="font-size:24px;">
          <a class="nav-link " href="signup and login/contactus.php" align="right">Contact Us</a>
        </li>
   

      </ul>
   
      
    </div>
  </nav>
</header>


<!--slider  -->
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="img/s1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="img/s2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/s0.jpg" class="d-block w-100" alt="...">
    </div>
  

  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br><br>
<div class="container">
	<div class="row card-pad">
		<div class="col-lg-4 col-md-4">
			<div class="card" style="width: 18rem;">
			  <img src="img/contact.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Contact Us</h5>
			    <p class="card-text">Details of developers where you can be in contact with them.</p>
			    <a href="signup and login/contactus.php" class="btn btn-primary">CONTACT US</a>
			  </div>
			</div>

		</div>
		<div class="col-lg-4 col-md-4">
			<div class="card" style="width: 18rem;">
			  <img src="img/how-it-works.png" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">How It Works ?</h5>
			    <p class="card-text">The system allows you to host game and join games </p>
			    <a href="signup and login/howitworks.php" class="btn btn-primary">HOST THE GAME</a>
			  </div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4">
			<div class="card" style="width: 18rem;">
			  <img src="img/a4.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Terms And Conditions</h5>
			    <p class="card-text">This section contain some terms rules and cnditions.</p>
			    <a href="signup and login/tnc" class="btn btn-primary">TERMS</a>
			  </div>
			</div>
		</div>


		</div>
	</div>	
<br>
<!-- Footer -->
<footer class="page-footer font-small blue"style="background-image:url(img/bg.jpg); background-repeat:no-repeat;background-size: 1800px;">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3"><p style="font-size:24px; color:#FFFFFF">Copyright By: Dhruv Thakkar, Kushan Somani and Nirmit Shah</p> 
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

  </body>
</html>