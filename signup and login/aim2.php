<?php
	session_start();
	if(isset($_SESSION['adminusername']))
	{	
		include("toptemplate3.php");
		include("hmenu3.php");
		include("../connection.php");
		
?>

<html>

	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">             
              <font color="#000000">&nbsp;&nbsp;  Info Of PlayMap</font>
			</h1>
			<br>
			<ul>
			<li>In the world of technology people play more digital games than the physical games.</li>
<li>PlayMap is the app in which a map is provided that includes location of different games like Cricket, Tennis, Volleyball as well indoor games like Chess, table tennis etc.</li>
<li>User are allowed to add the marker at the location in which they want to play the match, they can add players, location details, timing details, and description of the game if they need to.</li>
<li>And other users will be able to see that marker on the map and can join and can even invite other friends.</li>
<li>Features like adding friends, inviting friends to games and creating tournaments will be really helpful for the users.</li>

			</ul>
		</div>
</body>
</html>

<?php
	}
	else
	{
		header("location:../index.php");		
	}

?>
	