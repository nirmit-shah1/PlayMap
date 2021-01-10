<?php
	session_start();
if(isset($_SESSION['emailcommanusername']))
{
	include_once("../connection.php");
	include_once("toptemplate1.php");
	include_once("hmenu.php");
	$a=$_SESSION['reg_id'];
	
?>
<head>
<link href="style-box.css" rel="stylesheet" type="text/css" >
</head>	
<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update Profile Pic</font>
			</h1>

<table width="865" height="249" border="0">
<form action="" method="post" name="file" enctype="multipart/form-data" autocomplete="off">
<br />
<tr>
	<td width="309">Select profile pic</td>
	<td width="540"><input type="file" name="pimage" /> </td>
<br />
</tr>
<!--<tr>
	<td>Description</td>
	<td><input type="text" name="txtDesc" /></td>
</tr>-->
<tr>
	<td colspan="2" align="center"><input type="submit" class="button-3" name="submit" value="Upload File" onClick="javascript:return validate()" /></td>
</tr>
</form>
</table>
<a href="profile.php"><< Go Back</a>
</div>
<?php
//}
if(isset($_POST['submit']))
{
	if(getimagesize($_FILES['pimage']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
				
					$path="images/".$_FILES['pimage']['name'];
					if(move_uploaded_file($_FILES['pimage']['tmp_name'],$path))
					{
				
    	             /*$image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);*/
					$qry="update  images  set name='".$_FILES['pimage']['name']."' WHERE reg_id='".$reg_id."'";
                $result=mysqli_query($con,$qry);
					if($result)
					{
						echo "<br/>Image uploaded.";
					}
					else
					{
						echo "<br/>Image not uploaded.";
					}
				}
				}
				}
}
else
	header("location:../index.html");