<?php
session_start(); 
	include("../toptemplate.php");
	include_once("../connection.php"); 

	$_SESSION["userdirection"]=$_GET["uinfo"];
	$uinfo=$_GET["uinfo"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		label.error{
			color:red;
		}
	</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style1.css">
	<!-- --------------------------------------VALIDATION---------------------------------->
<script type="text/javascript" language="javascript">
function validateMyForm ( )
 { 
    var isValid = true;
	var email = document.getElementById('txtemail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
    if ( document.registration.txtFirst.value == "" )
	{ 
    alert ( "Please type your  First Name" ); 
    isValid = false;
    }
	else if ( document.registration.txtLast.value == "" ) 
	{ 
            alert ( "Please type your Last Name" ); 
            isValid = false;
    } 
}
function checkkLength(el) {
  if (el.value.length <= 5) {
    alert("length must be more than 5 characters")
  }
}

function checkLength(el) {
  if (el.value.length != 10) {
    alert("length must be exactly 10 numbers")
  }
}

</script>
<style>
.form-group
{
margin-bottom:0px;
}
.form-input
{
    border-bottom: 1px solid #5b8a5b;
}
</style>
</head>
<body style="background-image:url(../img/a1.jpg); ">

    <div class="main" >

        <section class="signup">
            
            <div class="container">
                <div class="signup-content" style="margin-bottom:10px;">
                    <form method="POST" id="signup-form" class="signup-form" action="signupback.php?uinfo=<?php echo $uinfo;?>">
                        <h2 class="form-title">Create Account</h2>
                        <div class="form-group">
						<table border="0" border-spacing:15px;>
				         <!-- FIRST NAME---------------------------------------->						
						<tr><td><font color="black"><b>First Name</b></font></td><td colspan="2">
                            <input type="text" class="form-input" autocomplete="off" name="txtfname" id="txtfname" placeholder="Your First Name" value="<?php if(isset($_SESSION['namevalue'])){echo $_SESSION['namevalue'];unset($_SESSION['namevalue']);}?>" onKeyUp="this.value = this.value.replace(/[^a-z,A-z]/g,'')"/></td></tr></div>
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
							<input type="text" class="form-input" id="txtlname" name="txtlname" placeholder="Your Last Name" value="<?php if(isset($_SESSION['lnamevalue'])){echo $_SESSION['lnamevalue'];unset($_SESSION['lnamevalue']);} ?>"onKeyUp="this.value = this.value.replace(/[^a-z,A-z]/g,'')"/></td></tr></div> 
						<?php
				if(isset($_SESSION['lnamerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Last Name</font>";
					unset($_SESSION['lnamerror']);?></td></tr><?php
				}
			?>
           
		   <!-- Alias NAME---------------------------------------->	
		   			
			<div class="form-group"><tr><td><font color="black"><b>Alias Name</b></font></td><td colspan="2">
							<input type="text" autocomplete="off" class="form-input" id="txtaname" name="txtaname" placeholder="Your Alias Name" value="<?php if(isset($_SESSION['anamevalue'])){echo $_SESSION['anamevalue'];unset($_SESSION['anamevalue']);} ?>"/></td></tr> </div>
						<?php
				if(isset($_SESSION['anamerror']))
				{?><tr><td></td><td><?php
					echo "<font color='red'>Please Enter Alias Name</font>";
					unset($_SESSION['anamerror']);?></td></tr><?php
				}
			?>
           
		   
		    <!--email-id---------------------------------------->				
			<div class="form-group"><tr><td><font color="black"><b>Email-Id</b></font></td><td colspan="2">
		   
                        <input type="email" autocomplete="off" class="form-input" placeholder="Email ID" id="emailid" name="emailid" value="<?php if(isset($_SESSION['emailvalue'])){echo $_SESSION['emailvalue'];unset($_SESSION['emailvalue']);}?>" /></td></tr>
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
	        	<input  type="password" autocomplete="off"  placeholder="Password"  class="form-input"                  id="password" name="password"/></td></tr>
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
			
		  <input name="txt_phno" autocomplete="off" type="text" class="form-input" id="groupidtext"  placeholder="contact no." value="<?php if(isset($_SESSION['phnovalue'])){echo $_SESSION['phnovalue'];unset($_SESSION['phnovalue']);}?>" maxlength="10" onKeyUp="this.value = this.value.replace(/[^0-9]/g,'')" /></td>
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
					<select name="gamequestion" class="form-input" >
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
					<select name="securityquestion" class="form-input" >
					<option>Select</option>
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
					<input placeholder="Security Answer" autocomplete="off" type="text" name="question" class="form-input" onkeyup="this.value = this.value.replace(/[^a-z,A-Z]/g,'')" class="text" value="<?php if(isset($_SESSION['questionvalue'])){echo $_SESSION['questionvalue'];unset($_SESSION['questionvalue']);}?>"/>
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
 <input type="submit" name="submit" onClick="javascript:return validateMyForm() id="submit" class="form-submit" style="background-image:url(img1/bg.jpg); margin-top:28px;" value="Sign up"/>
                       </div>
					</td></tr>	
                    </form>
					</table>
					
               <p class="loginhere">
                         Already have an account ? <a href="login.php?uinfo=<?php echo $uinfo;?>" class="loginhere-link">Login Here</a>
                    </p>    
                </div>
            </div>
        </section>

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
<?php include("../bottomtemplate.php"); ?>