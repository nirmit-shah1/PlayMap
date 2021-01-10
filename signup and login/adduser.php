<?php
session_start(); 
	include("toptemplate3.php");
	include("hmenu3.php");
	include_once("../connection.php"); 

	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
label.error{
color:red;
}
</style>
	<link href="style-box.css" rel="stylesheet" type="text/css" >
	</head>
	<body style=" background-image:url(img1/privacy1.jpg);background-repeat:no-repeat;background-size:cover;">
		<div class="white-box">
			<h1 style="background-color:#00AEAE; border-top-right-radius: 25px; border-top-left-radius: 25px;">              <font color="#000000">&nbsp;&nbsp; Update State</font>
			</h1>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
			<form method="POST" id="signup-form" class="signup-form" action="adduserback.php">
                        <h2 class="form-title">Create Account</h2>
                        <div class="form-group">
						<table border="0" border-spacing:15px;>
				         <!-- FIRST NAME---------------------------------------->						
						<tr><td><font color="black"><b>First Name</b></font></td><td colspan="2">
                            <input type="text" class="form-control" name="txtfname" id="txtFname" placeholder="Your First Name" value="<?php if(isset($_SESSION['namevalue'])){echo $_SESSION['namevalue'];unset($_SESSION['namevalue']);}?>" onKeyUp="this.value = this.value.replace(/[^a-z,A-z]/g,'')"/></td></tr></div>
					<?php
				if(isset($_SESSION['namerror']))
				{?> <tr><td></td><td><?php
					echo "<font color='red'>please enter name</font>";
					unset($_SESSION['namerror']);	
					?> </td></tr><?php
				}
			?></tr>
			
          
			<!-- LAST NAME---------------------------------------->				
			<tr><td><font color="black"><b>Last Name</b></font></td><td colspan="2"><div class="form-group">
							<input type="text" class="form-control" id="txtlname" name="txtlname" placeholder="Your Last Name" value="<?php if(isset($_SESSION['lnamevalue'])){echo $_SESSION['lnamevalue'];unset($_SESSION['lnamevalue']);} ?>"onKeyUp="this.value = this.value.replace(/[^a-z,A-z]/g,'')"/></td></tr></div> 
						<?php
				if(isset($_SESSION['lnamerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Last Name</font>";
					unset($_SESSION['lnamerror']);?></td></tr><?php
				}
			?>
           
		   <!-- Alias NAME---------------------------------------->	
		   			
			<div class="form-group"><tr><td><font color="black"><b>Alias Name</b></font></td><td colspan="2">
							<input type="text" class="form-control" id="txtaname" name="txtaname" placeholder="Your Alias Name" value="<?php if(isset($_SESSION['anamevalue'])){echo $_SESSION['anamevalue'];unset($_SESSION['anamevalue']);} ?>"/></td></tr> </div>
						<?php
				if(isset($_SESSION['anamerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Alias Name</font>";
					unset($_SESSION['anamerror']);?></td></tr><?php
				}
			?>
           
		   
		    <!--email-id---------------------------------------->				
			<div class="form-group"><tr><td><font color="black"><b>Email-Id</b></font></td><td colspan="2">
		   
                        <input type="email" class="form-control" placeholder="Email ID" id="emailid" name="emailid" value="<?php if(isset($_SESSION['emailvalue'])){echo $_SESSION['emailvalue'];unset($_SESSION['emailvalue']);}?>" /></td></tr>
				<?php
				if(isset($_SESSION['emailerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Email Id</font>";
					unset($_SESSION['emailerror']);?></td></tr><?php
				}
			?>	
			</div>
			 <!--password---------------------------------------->				
			<div class="form-group">
			<tr><td><b>Password</b></td><td colspan="2">
	        	<input onBlur="checkkLength(this)"  type="password"  placeholder="Password"  class="form-control"                  id="password" name="password" maxlength="10"/></td></tr>
				<?php
				if(isset($_SESSION['passerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Password</font>";
					unset($_SESSION['passerror']);	?></td></tr><?php
				}
				?>
				</div>
				<!-------------------------------------PHONE NUMBER--------------------------------------------->
			<div class="form-group"><tr><td><b>Phone Number</b></td><td colspan="2">
			
		  <input name="txt_phno" type="text" class="form-control" id="groupidtext" style="onBlur"checkLength(this)" placeholder="contact no." value="<?php if(isset($_SESSION['phnovalue'])){echo $_SESSION['phnovalue'];unset($_SESSION['phnovalue']);}?>" maxlength="10" onKeyUp="this.value = this.value.replace(/[^0-9]/g,'')" /></td>
		   </tr>
            	<!--<input type="text" max="10" size="10" placeholder="contact no." name="txt_phno" class="text"  />-->
				<?php
				if(isset($_SESSION['phnoerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>please enter phone number</font>";
					unset($_SESSION['phnoerror']);
				?></td></tr><?php
				}
			?>	
		</div>
			
			<!-------------------------------------Gender--------------------------------------------->
			<div class="form-group"><tr><td><b>
			Gender</b></td><td align="left">
				<input type="radio" name="rdb_gender"  checked="checked"  value="male" <?php if(isset($_SESSION['gendervalue']))
		  {
		  	if($_SESSION['gendervalue']=="male")
		  	{	
				echo "checked='checked'";
				unset($_SESSION['gendervalue']);
			}
		  } 	?>/>  male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="radio" name="rdb_gender"   value="female" <?php if(isset($_SESSION['gendervalue']))
		  {
		  	if($_SESSION['gendervalue']=="female")
		  	{	
				echo "checked='checked'";
				unset($_SESSION['gendervalue']);
			}
		  } 	?> >female
		   </td></tr>
		  	 <?php if(isset($_SESSION['gendererror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>please select gender</font>";
					unset($_SESSION['gendererror']);?></td></tr><?php
				}
			?>
			</div>
			<!-------------------------------------HOBBY--------------------------------------------->
			<div class="form-group"><tr><td>
				<b>Hobby</b>
				</td>
				<td colspan="2">
					<select name="gamequestion" class="form-control" >
				<?php
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
				</td>
		   
		   </select>
		   </div></tr>

					<!-------------------------------------question--------------------------------------------->
			<div class="form-group"><tr><td>
				<b>Security Questions</b>
				</td>
				<td colspan="2">
					<select name="securityquestion" class="form-control" >
				<?php
					$query=mysqli_query($con,"select * from securityquestion");
					while($data=mysqli_fetch_array($query))
					{
						
						if(isset($_SESSION['securityquestionvalue']))
						{
							if($_SESSION['securityquestionvalue']==$data[0])
							{
								echo "<option value=$data[0] selected=selected>$data[1]</option>";					
								unset($_SESSION['securityquestionvalue']);
							}
							else
							{
								echo "<option value=$data[0]>$data[1]</option>";					
							}
						}
						else
						{
							echo "<option value=$data[0]>$data[1]</option>";					
						}
					}
				?>
				</td>
		   
		   </select>
		   </div></tr>
		   
		   	<div class="form-group">
		   <tr>
		   	<td><b>Answer</b></td>
				<td rowspan="2">
					<input placeholder="Security Answer" type="text" name="question" class="form-control" onkeyup="this.value = this.value.replace(/[^a-z,A-Z]/g,'')" class="text" value="<?php if(isset($_SESSION['questionvalue'])){echo $_SESSION['questionvalue'];unset($_SESSION['questionvalue']);}?>"/>
				</td>
		   </tr>
		   <?php
				if(isset($_SESSION['questionerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>please enter answer</font>";
					unset($_SESSION['questionerror']);
				?></td></tr><?php
				} 
		   		if(isset($_SESSION['inserterror']))
				{
					?>		   <tr><td colspan="2" align="center"><?php
					echo "<font color='red'>Error In inserting</font>";
			
					unset($_SESSION['inserterror']);?></td>
					
			</tr><?php
				}?></div>
			<tr></tr>
			
 <div class="form-group"><tr><td colspan="2">
 <input type="submit" class="btn btn-primary" name="submit" onClick="javascript:return validateMyForm() id="submit" class="form-submit" style="background-image:url(img1/bg.jpg); margin-top:28px;" value="Sign up"/>
                       </div>
					</td></tr>	
                    </form>
					
			</div>
		</div>
	</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$('form[id="signup-form"]').validate({
  rules: {
    txtfname: {
      required: true,
   },

      txtlname: {
      required: true,
   },

      txtaname: {
      required: true,
   },

   	   emailid: {
       required: true,
       email:true,
   },
 	
 	password: {
       required: true,
       minlength:6,
   },
 	
 	txt_phno: {
       required: true,
       minlength:10,
   },
   question: {
       required: true,
   },

   rdb_gender:{
   		required:true,
   },
	

     },
  messages: {
    
    /*	psword: {
    		  minlength: 'Password must be at least 8 characters long'
    		}
*/  },
  submitHandler: function(form) {
    form.submit();
  }


});
</script>

</body>
</html>
