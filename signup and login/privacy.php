<?php
	session_start();
	if(isset($_SESSION['reg_id']) && isset($_SESSION['emailcommanusername']))
	{	
		include("toptemplate1.php");
		include("hmenu.php");
		include("../connection.php");
		$reg_id=$_SESSION['reg_id'];	
?>
<html>
	<head>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	
	<script type="text/javascript">
		$(document).ready(function() {
		
    $('a.edit').click(function () {
        var dad = $(this).parent().parent();
        dad.find('label').hide();
        document.getElementById("n1").style.visibility="visible";
		document.getElementById("b1").style.visibility="visible";
    });

    document.getElementById("n1").focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
    });
});
	$(document).ready(function() {

	$('a.edit1').click(function () {
        var dad = $(this).parent().parent();
        dad.find('label').hide();
		
        document.getElementById("n2").style.visibility="visible";
		document.getElementById("b2").style.visibility="visible";
    });

    document.getElementById("n2").focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
    });
});
	$(document).ready(function() {

	$('a.edit2').click(function () {
        var dad = $(this).parent().parent();
        dad.find('label').hide();
		alert("hello");
        document.getElementById("n3").style.visibility="visible";
		document.getElementById("b3").style.visibility="visible";
    });

    document.getElementById("n3").focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
    });
});
$(document).ready(function() {

	$('a.edit3').click(function () {
        var dad = $(this).parent().parent();
        dad.find('label').hide();
		alert("hello");
        document.getElementById("n4").style.visibility="visible";
		document.getElementById("b4").style.visibility="visible";
    });

    document.getElementById("n4").focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
    });
});
$(document).ready(function() {

	$('a.edit4').click(function () {
        var dad = $(this).parent().parent();
        dad.find('label').hide();
		alert("hello");
        document.getElementById("n5").style.visibility="visible";
		document.getElementById("b5").style.visibility="visible";
    });

    document.getElementById("n5").focusout(function() {
        var dad = $(this).parent();
        $(this).hide();
        dad.find('label').show();
    });
});

	</script>
	<style type="text/css">
		.edit-input 
		{
		    display:none;
		}
	</style>
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Privacy</font>
			</h1>
			<table width="853" cellspacing="10">
						
						<tr>
						<td  rowspan="2" width="50%">
							Who can look your's full name you provided?	 </td>
						<td width="25%"  colspan="2">
							<form action="privacyback.php" method="post">
							<input type="text" name="uinfo" value="name" style="visibility:hidden">
								<select id="n1" name="p1" style="visibility:hidden">
									<option value="all">Everyone</option>
									<option value="friend">Only friends</option>
									<option value="private">Private</option>									
								</select>
								<label for="name">
								<p    style=" margin-left: -96px; margin-bottom: 0px;">
								<?php
						        $sql1=mysqli_query($con,"select * from privacy where reg_id='".$reg_id."'"); 
								$data22=mysqli_fetch_array($sql1);
								if($data22[1] == "all")
								{
								echo "Everyone";
								}
								elseif($data22[1] == "friend")
								{
								echo "Only friends";
								}
								else
								{
								
								echo "Private";
								}
								?>
								</p>
							</label>
							
							</td>
								<td width="26" rowspan="2"><a href="#" class="edit">Edit</a></td></tr>
								<tr><td><input type="submit" name="b1" value="Done" id="b1" style="background-color:#00CC33; visibility:hidden"> </form></td></tr>
							
<!--------------------------------------------------------EMAIL----------------------------------------------->
<tr>
						<td  rowspan="2" width="50%">
							Who can look your Email Address you provided?	 </td>
						<td width="25%"  colspan="2">
							<form action="privacyback.php" method="post">
							<input type="text" name="uinfo" value="email" style="visibility:hidden">
								<select id="n2" name="p1" style="visibility:hidden">
									<option value="all">Everyone</option>
									<option value="friend">Only friends</option>
									<option value="private">Private</option>									
								</select>
								<label for="name">
								<p    style=" margin-left: -96px; margin-bottom: 0px;">
								<?php
								if($data22[2] == "all")
								{
								echo "Everyone";
								}
								elseif($data22[2] == "friend")
								{
								echo "Only friends";
								}
								else
								{
								
								echo "Private";
								}
								?>
								</p>
							</label>
							
							</td>
								<td width="26" rowspan="2"><a href="#" class="edit1">Edit</a></td></tr>
								<tr><td><input type="submit" value="Done" name="b2" id="b2" style="background-color:#00CC33; visibility:hidden"> </form></td></tr>
<!--------------------------------------------------------PHONE----------------------------------------------->
<tr>
						<td  rowspan="2" width="50%">
							Who can look your phone number you provided?	 </td>
						<td width="25%"  colspan="2">
							<form action="privacyback.php" method="post">
							<input type="text" name="uinfo" value="phone" style="visibility:hidden">
								<select id="n3" name="p1" style="visibility:hidden">

									<option value="friend">Only friends</option>
									<option value="private">Private</option>									
								</select>
								<label for="name">
								<p    style=" margin-left: -96px; margin-bottom: 0px;">
								<?php
								if($data22[3] == "all")
								{
								echo "Everyone";
								}
								elseif($data22[3] == "friend")
								{
								echo "Only friends";
								}
								else
								{
								
								echo "Private";
								}
								?>
								</p>
							</label>
							
							</td>
								<td width="26" rowspan="2"><a href="#" class="edit2">Edit</a></td></tr>
								<tr><td><input type="submit" value="Done" name="b3" id="b3" style="background-color:#00CC33; visibility:hidden"> </form></td></tr>
							
<!--------------------------------------------------------PHONE----------------------------------------------->
<tr>
						<td  rowspan="2"  width="50%">
							Who can look your gender  you provided?	 </td>
						<td width="25%"  colspan="2">
							<form action="privacyback.php" method="post">
							<input type="text" name="uinfo" value="gender" style="visibility:hidden">
								<select id="n4" name="p1" style="visibility:hidden">
									<option value="all">Everyone</option>
									<option value="friend">Only friends</option>
									<option value="private">Private</option>									
								</select>
								<label for="name">
								<p    style=" margin-left: -96px; margin-bottom: 0px;">
								<?php
								if($data22[4] == "all")
								{
								echo "Everyone";
								}
								elseif($data22[4] == "friend")
								{
								echo "Only friends";
								}
								else
								{
								
								echo "Private";
								}
								?>
								</p>
							</label>
							
							</td>
								<td width="26" rowspan="2"><a href="#" class="edit3">Edit</a></td></tr>
								<tr><td><input type="submit" value="Done" name="b4" id="b4" style="background-color:#00CC33; visibility:hidden"> </form></td></tr>
<!--------------------------------------------------------PHONE----------------------------------------------->
<tr>
						<td  rowspan="2" width="50%">
							Who can send you friend request?
						</td>
						<td width="25%"  colspan="2">
							<form action="privacyback.php" method="post">
							<input type="text" name="uinfo" value="request" style="visibility:hidden">
								<select id="n5" name="p1" style="visibility:hidden">
									<option value="all">Everyone</option>
								
									<option value="private">Private</option>									
								</select>
								<label for="name">
								<p    style=" margin-left: -96px; margin-bottom: 0px;">
								<?php
								if($data22[5] == "all")
								{
								echo "Everyone";
								}
								elseif($data22[5] == "friend")
								{
								echo "Only friends";
								}
								else
								{
								
								echo "Private";
								}
								?>
								</p>
							</label>
							
							</td>
								<td width="26" rowspan="2"><a href="#" class="edit4">Edit</a></td></tr>
								<tr><td><input type="submit" value="Done" name="b5" id="b5" style="background-color:#00CC33; visibility:hidden"> </form></td></tr>
							

							

		  </table>
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