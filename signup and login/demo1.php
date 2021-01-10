<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{
	include("../connection.php");
	$reg_id=$_SESSION['reg_id'];	
			$sql5=mysqli_query($con,"select * from rating where hid='".$reg_id."'");
								$rating=0;
								$count=1;
								if(($row5=mysqli_fetch_array($sql5))!=NULL)
								{
								
									$value=$row5['rate'];
									$value1=(int)$value;
									$rating=($value1+$rating)/$count;
									$count++;
								}
								else
								{
									$final=2;
								}
								if($rating<= 2.5)
								{
									$final=2;
								}
								else
								{
									$final=3;
								}
								$sql="select * from routedetails where reg_id='".$reg_id."'";
								$result=mysqli_query($con,$sql);
								$answer=mysqli_num_rows($result);
								if($final ==2)
								{
									if($answer>=2)
									$command="stop";
									else
									$command="start";
								}
								if($final ==3)
								{
									$command="start";
								}
if($command=="start")
{
	
     /*   echo "ok";
        die();*/
		include("toptemplate1.php");
		include("hmenu.php");
		
		
?>
		<html>
			<head>
				<link href="style-box.css" rel="stylesheet" type="text/css" >
				<style>
                .map{


                height:439px;
                width:370px;
                margin-top:250px;
                position:absolute;
                right:22px;
                top:19px;
                margin-right:1.5%;        

}
									</style>
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	   </script>

        <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;key=AIzaSyCDha-svaqgxaLBpa_clAdoPRaD1Fv_-sg&libraries=places" type="text/javascript"></script>

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
		<SCRIPT LANGUAGE="javascript"> 
function validateForEnter() 
{    
	if (event.keyCode == 13) 
	{        
		event.cancelBubble = true;
		event.returnValue = false;
         }
} 
</SCRIPT> 

<script type="text/javascript">
window.onload = function() {
    document.getElementById('day').style.display = 'none';
    document.getElementById('day1').style.display = 'none';
}
function gametypecheck()
{
	if(document.getElementById('onedaygame').checked)
	{
		document.getElementById('day').style.display = 'none';	
		document.getElementById('day1').style.display = 'none';	
	}
	else if(document.getElementById('recuringgame').checked)
	{
		document.getElementById('day').style.display = 'block';	
		document.getElementById('day1').style.display = 'block';	
	}
}
</script>
</head>


				<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
				
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;"><font color="#000000">&nbsp;&nbsp; Location Details</font>
			</h1>
	<form action="demo1_back.php" method="get">
		            <div id="map" class="map" 
></div>
		<table width="638" cellpadding="5" class="trip" >
		<tr>
			<td colspan="2">
				<font size="+1"><b>Type Of Game</b></font>
			</td>
		</tr>
		
		<tr>
			<td width="190">
				<input id="onedaygame" type="radio" name="rdb_selectday" value="oneday" checked="checked" <?php if(isset($_SESSION['gametypevalue'])){	if($_SESSION['gametypevalue']=="oneday"){ echo " checked=checked";unset($_SESSION['gametypevalue']);}} ?>onclick="javascript:gametypecheck();"/>		
				One-day Game	
		  </td>
			<td width="420" ><input id="recuringgame" type="radio" name="rdb_selectday" value="multipleday" onClick="javascript:gametypecheck();" <?php if(isset($_SESSION['gametypevalue'])){	if($_SESSION['gametypevalue']=="multipleday"){ echo " checked=checked";unset($_SESSION['gametypevalue']); } } ?>/>Multiple-Days games
		  </td></tr>
			<tr>
			<td colspan="2"><?php if(isset($_SESSION['rdb_selectdayerror'])){ echo "<font color=red>Select Game Type</font>";unset($_SESSION['rdb_selectdayerror']); } ?>
			</td>
		</tr>
		<tr><td colspan="2">
			<font size="+1"><b>Exact Destination</b></font>
		</td></tr>
		<tr><td>
                    Your Location:</td><td><input id="searchTextFieldSource" class="form-control" type="text" name="source" size="50" onKeyDown="validateForEnter();" value="<?php if(isset($_SESSION['sourcevalue'])){ echo $_SESSION['sourcevalue'];unset($_SESSION['sourcevalue']); } ?>"placeholder="Enter your location" autocomplete="on" runat="server" />  
                    <input type="hidden" id="city1" name="city1" />
                    <input type="hidden" id="cityLat1" name="cityLat1" />
                    <input type="hidden" id="cityLng1" name="cityLng1" />  
		</td></tr>
		<tr>
			<td></td>
			<td style="padding-left:18px;"><?php if(isset($_SESSION['sourceerror'])){ echo "<font color=red>Enter Your Location</font>";unset($_SESSION['sourceerror']); } ?>
			</td>
		</tr>
		<tr><td>
Venue:</td><td><input id="searchTextFieldDestination" class="form-control" type="text" name="destination" onKeyDown="validateForEnter();" value="<?php if(isset($_SESSION['destinationvalue'])){ echo $_SESSION['destinationvalue'];unset($_SESSION['destinationvalue']); } ?>" size="50" placeholder="Enter the venue" autocomplete="on" runat="server" />  
                    <input type="hidden" id="city2" name="city2" />
                    <input type="hidden" id="cityLat2" name="cityLat2" />
                    <input type="hidden" id="cityLng2" name="cityLng2" />  
        </td></tr>
		<tr>
			<td></td>
			<td style="padding-left:18px;"><?php if(isset($_SESSION['destinationerror'])){ echo "<font color=red>Enter the Venue Location</font>";unset($_SESSION['destinationerror']); } ?>
			</td>
		</tr>
		<tr><td>
                  Famous Landmark 1:</td><td><input id="searchTextFieldIntermediateSource"  class="form-control" type="text" name="intermediatedestination1" onKeyDown="validateForEnter();"value="<?php if(isset($_SESSION['intermediated1value'])){ echo $_SESSION['intermediated1value'];unset($_SESSION['intermediated1value']); } ?>" size="50" placeholder="Enter the landmark" autocomplete="on" runat="server" />  
                    <input type="hidden" id="city3" name="city3" />
                    <input type="hidden" id="cityLat3" name="cityLat3" />
                    <input type="hidden" id="cityLng3" name="cityLng3" />  
        </td></tr>
		<tr>
			<td></td>
			<td style="padding-left:18px;"><?php if(isset($_SESSION['intermediated1error'])){ echo "<font color=red>Enter the Landmark Location</font>";unset($_SESSION['intermediated1error']); } ?>
			</td>
		</tr>
		<tr><td>
		             Famous Landmark 2:</td><td><input id="searchTextFieldIntermediateDestination" type="text" size="50" placeholder="Enter the landmark" autocomplete="on" onKeyDown="validateForEnter();" class="form-control" name="intermediatedestination2" value="<?php if(isset($_SESSION['intermediated2value'])){ echo $_SESSION['intermediated2value'];unset($_SESSION['intermediated2value']); } ?>" runat="server" />  
                    <input type="hidden" id="city4" name="city4" />
                    <input type="hidden"id="cityLat4" name="cityLat4" />
                    <input type="hidden" id="cityLng4" name="cityLng4" />  
		</td>	</tr>
		<tr>
			<td></td>
			<td style="padding-left:18px;"><?php if(isset($_SESSION['intermediated2error'])){ echo "<font color=red>Enter the Landmark Location</font>";unset($_SESSION['intermediated2error']); } ?>
			</td>
		</tr>
	  </table><br />

	<table class="trip" cellpadding="5">
	<?php 
		$y=date('Y');
		$a=date('m');
		$d=date('d');
		//echo $a;
		//settype($a,"integer");
		$a++;
		$a++;
		$a++;
		$m="0";
		$m.=$a;
	?>
		<tr>
			<td colspan="3">
				<font size="+1"><b>Date and Time</b></font>
			</td>
		</tr>
		<tr>
			<td width="155">Game date</td>
			<td >Game Time</td>
			<td id="day">Days</td>
		</tr>
		<tr>
			<td><input type="date" value="<?php if(isset($_SESSION['departuredatevalue'])){echo $_SESSION['departuredatevalue'];unset($_SESSION['departuredatevalue']);}?>" name="departuredate" min="<?php echo date('Y-m-d');?>" max="<?php 
			echo $y."-".$m."-".$d?>"/>
			</td>
			<td width="161"><select name="timehour">
				<option value="">HH</option>
				<option value="00"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="00"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>00</option>
				<option value="01"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="01"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>01</option>
				<option value="02"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="02"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>02</option>
				<option value="03"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="03"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>03</option>
				<option value="04"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="04"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>04</option>
				<option value="05"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="05"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>05</option>
				<option value="06"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="06"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>06</option>
				<option value="07"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="07"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>07</option>
				<option value="08"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="08"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>08</option>
				<option value="09"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="09"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>09</option>
				<option value="10"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="10"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>10</option>
				<option value="11"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="11"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>11</option>
				<option value="12"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="12"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>12</option>
				<option value="13"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="13"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>13</option>
				<option value="14"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="14"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>14</option>
				<option value="15"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="15"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>15</option>
				<option value="16"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="16"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>16</option>
				<option value="17"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="17"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>17</option>
				<option value="18"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="18"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>18</option>
				<option value="19"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="19"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>19</option>
				<option value="20"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="20"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>20</option>
				<option value="21"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="21"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>21</option>
				<option value="22"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="22"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>22</option>
				<option value="23"<?php if(isset($_SESSION['timehourvalue'])){ if($_SESSION['timehourvalue']=="23"){echo "selected=selected"; unset($_SESSION['timehourvalue']);}} ?>>23</option>	
			</select>
			<select name="timeminute">
				<option value="">MM</option>
				<option value="00"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="00"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>00</option>
				<option value="10"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="10"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>10</option>
				<option value="20"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="20"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>20</option>
				<option value="30"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="30"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>30</option>
				<option value="40"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="40"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>40</option>
				<option value="50"<?php if(isset($_SESSION['timeminutevalue'])){ if($_SESSION['timeminutevalue']=="50"){echo "selected=selected"; unset($_SESSION['timeminutevalue']);}}?>>50</option>
			</select>
			</td><td width="244">
			<select name="days" id="day1">
				<option value="2">2</option>
				<option  value="3"selected="selected">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
			</td></tr>
			<tr>
			<td><?php if(isset($_SESSION['departuredateerror'])){ echo "<font color=red>Select Date</font>";unset($_SESSION['departuredateerror']); } ?>
			</td>
			<td><?php if(isset($_SESSION['timehourerror'])){ echo "<font color=red>Select Game Hour</font>";unset($_SESSION['timehourerror']); } ?>
			</td>
			<td><?php if(isset($_SESSION['timeminuteerror'])){ echo "<font color=red>Select Game Minute</font>";unset($_SESSION['timeminuteerror']); } ?>
			</td>
		</tr>
	</table>
    <br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="btn btn-success" style="background-color:#00CC66; width:80px;" type="submit" name="btn_next" value="Next" />
	<br><br><br>
<br></form>
</div>		
<br>
				

			</body>
		</html>
<?php

}
else if($command== "stop")
{
			include("toptemplate1.php");
		include("hmenu.php");
		?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	<style>
	.hrc{
		border:2px solid yellow;
	}
	</style>
</head>
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box" >
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp;Host Game</font></h1>
		
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="demo2.php" style="float:left;"><img style="height:107px;" src="plus.jpeg"></a>
				<?php 
				echo "<font size='+4'>You cannot host more than two game now.</font>";	
				echo "<br><br><br><br>";
					
}
}
	else
	{
echo header("location:../index.php");		
	}

?>


