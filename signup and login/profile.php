<?php
	session_start();
	if(isset($_SESSION['reg_id']))
	{	
	include_once("../connection.php");
	include_once("toptemplate1.php");
	include_once("hmenu.php");
	
?>
	<html>
		<head>
			<link href="style-box.css" rel="stylesheet" type="text/css">
			<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
			<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
			<script language="javascript" type="text/javascript">
					var isvalid=true;
					function validate()
					{	
					   if(isvalid==false)
					   {
						  isvalid=true;
						  validate();
						  
					   }
						if(document.file.image.value == "")
						{
							alert("enter the image");
							isvalid=false;
						}
						else if(document.file.txtDesc.value == "")
						{
							alert("enter the description");
							isvalid=false;
						}
					return isvalid;
					}
					
				</script>
				<style type="text/css">
					input
					{
					  font-size: 20px;
					  height:50px;
					}
					.imagediv 
					{
						float:left;
						margin-top:50px;
					}
					.imagediv .showonhover 
					{
						background:red;
						padding:20px;
						opacity:0.9;
						color:white;
						width: 100%;
						display:block;	
						text-align:center;
						cursor:pointer;
					}
					.button-3
					{
						position: relative;
						padding: 26px 0px 16px 0px;
						margin:15px 0px -44px 67px;
						height: 42px;
						width: 237px;
						float: left;
						border-radius: 10px;
						font-family: 'Helvetica', cursive;
						font-size: 25px;
						color: #FFF;
						padding-top:3px;
						text-decoration: none;
						text-align: center;
						background-color: #00CC00;
						border-bottom: 5px solid #999999;
						text-shadow: 0px -2px #FFFFF;
						transition: all 0.1s;
						-webkit-transition: all 0.1s;		
						
					}
					.button-3:hover, 
					.button-3:focus 
					{	
						text-decoration: none;
						color: #fff;
					}
					
					.button-3:active
					 {
						transform: translate(0px,5px);
						-webkit-transform: translate(0px,5px);
						border-bottom: 1px solid;
					}
							
				</style>
	
	</head>
	<body style="background-image:url(img1/a11.jpg); background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
		<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;"><font         color="#000000">&nbsp;&nbsp; Profile</font></h1>
		<?php
			set_time_limit(4); 
       		ini_set('memory_limit', '512M'); 
       	    $a=$_SESSION['reg_id'];
			$sql=mysqli_query($con,"select * from images where reg_id='".$a."'");
			$result=mysqli_fetch_array($sql);
			$no=mysqli_num_rows($sql);
			if($no>0)
	 		{
				$sql1=mysqli_query($con,"select * from images where reg_id='".$a."'");
				while($row=mysqli_fetch_array($sql1))
				{
					echo '<img  style=margin-bottom:150px; height="300" width="300" src="images/'.$row[1].' "> ';
	 
				}
		?>
				<form action="updateprofile.php" method="post">
				<input type="submit" style="margin-top:-322px; margin-left:343px;" value="Update Photo" name="update" class="button-3">
				</form>
	</div>
	<?php			
	 
	}
	else
	{
	?>  
		<table width="1033" height="370" border="0" align="center">
		<form action="" method="post" name="file" enctype="multipart/form-data" autocomplete="off">
		<tr>
			<td width="200" height="285"><img src="img1/blank.jpg" alt="Avatar" width="204" height="190"             style="width:200px;border-radius:50%;">
			 	<input type="file" name="pimage" />
				<?php
				if(isset($_SESSION['emptyerror']))
				{?> <tr><td></td><td><?php
					echo "<font color='red'>Please Select Image</font>";
					unset($_SESSION['emptyerror']);	
					?> </td></tr><?php
				}
			?>
		</tr>
			<td width="817"><input type="submit" class="button-3" name="submit" value="Upload Photo"                              onClick="javascript:return validate()" />
			</td>
		    <br />
		</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	</form>
	</div>
	<?php
	//}
	if(isset($_POST['submit']))
	{
		if(getimagesize($_FILES['pimage']['tmp_name']) == FALSE)
					{
						$_SESSION['emptyerror']=1;
						header("location:profile.php");
					}
					else
					{
					
						$path="images/".$_FILES['pimage']['name'];
						if(move_uploaded_file($_FILES['pimage']['tmp_name'],$path))
						{
					
						 $qry="insert into images (reg_id,name) values ('$a','".$_FILES['pimage']['name']."')";
						$result=mysqli_query($con,$qry);
						if($result)
						{
							echo "<br/>Image uploaded.";
							unset($_POST['submit']);
						}
						else
						{
							echo "<br/>Image not uploaded.";
						}
								//saveimage($name,$image);
						}
					}
				}
				}
		?>
				
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
