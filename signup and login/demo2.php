<?php
session_start();
if(isset($_SESSION['emailcommanusername']))
{	
		$reg_id=$_SESSION['reg_id'];	
	include_once("toptemplate1.php");	
			include("hmenu.php");
		include("../connection.php");
	
	
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<style>
	
	input[type="text"]:focus,input[type="text"].focus {
	  box-shadow: inset 1px 1px 2px 0 #c9c9c9;
	}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="style2.css" type="text/css" rel="stylesheet" />	
	<title>Search for game</title>
		<script>
	function fnchecked(blnchecked)
	{
	if(blnchecked)
	{
	document.getElementById("div1").style.display = "";
	}
	else
	{
	document.getElementById("div1").style.display = "none";
	}
	}
	</script>
		   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	
			 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;key=AIzaSyCDha-svaqgxaLBpa_clAdoPRaD1Fv_-sg&libraries=geometry,places" type="text/javascript"></script>
			<script type="text/javascript">
				var locations = new Array();
				var directionsDisplay;
				var directionsService = new google.maps.DirectionsService();
	
				//calculates distance between two points in km's
				function calcDistance(p1, p2){
					return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
				 }
	
				function initialize() {
	
					//alert("Inside Initialize");
					var UserSource = document.getElementById('searchTextFieldSource');
					var UserDestination = document.getElementById('searchTextFieldDestination');
					var DbSource = document.getElementById('searchTextFieldIntermediateSource');
					var DbDestination = document.getElementById('searchTextFieldIntermediateDestination');
	
	
	
					var ACUserSource = new google.maps.places.Autocomplete(UserSource);
					var ACUserDestination = new google.maps.places.Autocomplete(UserDestination);
					var ACDbSource = new google.maps.places.Autocomplete(DbSource);
					var ACDbDestination = new google.maps.places.Autocomplete(DbDestination);
	
					google.maps.event.addListener(ACDbDestination, 'place_changed', function () {
						var place1 = ACUserSource.getPlace();
	
						document.getElementById('city1').value = place1.name;
	
						var place1Lat = place1.geometry.location.lat();
						var place1Lng = place1.geometry.location.lng();
	
						document.getElementById('cityLat1').value = place1Lat;
						document.getElementById('cityLng1').value = place1Lng;
	
						var obj = new Object();
						obj.city = place1.name;
						obj.latitude = place1.geometry.location.lat();
						obj.longitude = place1.geometry.location.lng();
						locations.push(obj);
	
	
						var place2 = ACUserDestination.getPlace();
						document.getElementById('city2').value = place2.name;
						var place2Lat = place2.geometry.location.lat();
						var place2Lng = place2.geometry.location.lng();
						document.getElementById('cityLat2').value = place2Lat;
						document.getElementById('cityLng2').value = place2Lng;
	
						var obj = new Object();
						obj.city = place2.name;
						obj.latitude = place2.geometry.location.lat();
						obj.longitude = place2.geometry.location.lng();
						locations.push(obj);
	
						//For intermediate point Source
						var place3 = ACDbSource.getPlace();
						document.getElementById('city3').value = place3.name;
						var place3Lat = place3.geometry.location.lat();
						var place3Lng = place3.geometry.location.lng();
						document.getElementById('cityLat3').value = place3Lat;
						document.getElementById('cityLng3').value = place3Lng;
	
						 //For intermediate point Destination
						var place4 = ACDbDestination.getPlace();
						document.getElementById('city4').value = place4.name;
						var place4Lat = place4.geometry.location.lat();
						var place4Lng = place4.geometry.location.lng();
						document.getElementById('cityLat4').value = place4Lat;
						document.getElementById('cityLng4').value = place4Lng;
	
						var p1 = new google.maps.LatLng(place1Lat, place1Lng);
						var p2 = new google.maps.LatLng(place2Lat, place2Lng);
	
	
	
						//alert(calcDistance(p1, p2));
	
						directionsDisplay = new google.maps.DirectionsRenderer();
	
						var startPlace = new google.maps.LatLng(place1Lat, place1Lng);
	
						var mapOptions = {
							zoom: 7,
							center: startPlace
						}
	
						var map = new google.maps.Map(document.getElementById('map'), mapOptions);
						directionsDisplay.setMap(map);
	
						var start = $("#city1").val();
						var end = $("#city2").val();
	
						var request = {
							origin: start,
							destination: end,
							travelMode: google.maps.TravelMode.DRIVING
						};
	
						var positionsource = new google.maps.LatLng(place3Lat, place3Lng);
						var positiondestination = new google.maps.LatLng(place4Lat, place4Lng);
	
						/*if(calcDistance(positiondestination, p1)> calcDistance(positiondestination, p2)) {
							alert("Straight path");
						}
						else {
							alert("Reverse path");
						}*/
	
						/*var heading1 = google.maps.geometry.spherical.computeHeading(p1, p2);
						alert("heading1: " + heading1);
	
						alert("heading2: " + heading2);*/
	
						directionsService.route(request, function (result, status) {
							if (status == google.maps.DirectionsStatus.OK) {
								directionsDisplay.setDirections(result);
	
								if ((google.maps.geometry.poly.isLocationOnEdge(positionsource,
									new google.maps.Polyline({ path: google.maps.geometry.encoding.decodePath(result.routes[0].overview_polyline.points) }),
									0.0100000000))&(google.maps.geometry.poly.isLocationOnEdge(positiondestination,
									new google.maps.Polyline({ path: google.maps.geometry.encoding.decodePath(result.routes[0].overview_polyline.points) }),
									0.0100000000))) 
	
								{
	
									alert("Belongs to the path");
									var heading2 = google.maps.geometry.spherical.computeHeading(positionsource, positiondestination);
									if(heading2<0) {
										alert("Reverse direction");
									}
								}
								else {
									alert("Doesnt Belong to the path");
								}
	
							  }
						});
					});
				}
				google.maps.event.addDomListener(window, 'load', initialize);
	
				function refreshMap(locations) {
					google.maps.visualRefresh = true;
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 10,
						center: new google.maps.LatLng(locations[0].latitude, locations[0].longitude),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					});
	
					var infowindow = new google.maps.InfoWindow();
					var marker, i;
	
					for (i = 0; i < locations.length; i++) {
						marker = new google.maps.Marker({
							position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
							map: map
						});
	
						google.maps.event.addListener(marker, 'click', (function (marker, i) {
							return function () {
								infowindow.setContent(locations[i].city);
								infowindow.open(map, marker);
							}
						})(marker, i));
					}
	
	
				}
			</script>
			
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Search For Game</font>
			</h1>
	<form action="searchback.php" method="get">
	<!--From<input type="text" name="txtFrom" />
	<?php
	/*if(isset($_SESSION['frmerror']))
	{
	echo"enter your source";
	unset($_SESSION['frmerror']);
	}
	?>
	To<input type="text" name="txtTo" />
	<?php
	if(isset($_SESSION['toerror']))
	{
	echo"enter your source";
	unset($_SESSION['toerror']);
	}
	*/?>-->
	
	
	  <div class='container'>
	  <div class="row">
	  <div class='col-2'>Venue:=</div> <div class='col-10'><input padding="100px" style='width:40%;' id="searchTextFieldDestination" class="form-control" type="text" name="txtto" value="<?php if(isset($_SESSION['tovalue'])){ echo $_SESSION['tovalue'];unset($_SESSION['tovalue']); } ?>" size="50" placeholder="Enter the destination" autocomplete="on" runat="server" />  </div>
	  				<input type="hidden" id="city2" name="city2" />
						<input type="hidden" id="cityLat2" name="cityLat2" />
		<input type="hidden" id="cityLng2" name="cityLng2" /> 
		 <?php if(isset($_SESSION['toerror'])){?> <br /><?php echo "<font color=red>Enter Destination Location</font>";unset($_SESSION['toerror']); } ?>
	
		<br />	<br  />
		</div>
		<div class="row">
		         <div class="col-2"> Game:	</div>
							<div class="col-10"><select name="exp" class="form-control" style="width:20%;	">
	</div><?php
					$query1=mysqli_query($con,"select * from game");
					while($data1=mysqli_fetch_array($query1))
					{
						
						if(isset($_SESSION['gamequestionvalue']))
						{
							if($_SESSION['gamequestionvalue']==$data1[1])
							{
								echo "<option value=$data1[1] selected=selected>$data1[1]</option>";					
								unset($_SESSION['gamequestionvalue']);
							}
							else
							{
								echo "<option value=$data1[1]>$data1[1]</option>";					
							}
						}
						else
						{
							echo "<option value=$data1[1]>$data1[1]</option>";					
						}
					}
					
				?>
				</select>
					</div>
					<div class="row">
					<div class="col-md-2"></div>
					<div class="10">
		<input class="btn btn-warning" type="submit" value="search" name="submit"/>
	 				</div>
					</div>
					</div>
					</div>
	
	
	</form>
	</div>
	  </div>
		
	<br />
	</div>
	</body>

	</html>
<?php

}
else
	header("location:../index.php");
?>