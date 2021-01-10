<?php
		session_start();

	include("../toptemplate.php");
	include_once("../connection.php"); 

$uinfo=$_GET['uinfo'];
		if(isset($_POST['btn_login'])){
			$_SESSION['userdirection']=$_GET['uinfo'];
			
			$str1="location:login2.php?uinfo=".$uinfo;

			include_once("../connection.php");
		
			$uid=$_POST['txt_loginid'];
			$password=$_POST['txt_password'];
			
			if($uid==""){
				$uidEmpty=1;
			}
			if($password==""){
				$passwordEmpty=1;
			}
	
			if(($uid=="admin@gmail.com" || $uid=="ADMIN") && $password=="123456")
			{
				$_SESSION['adminusername']="admin";
				header("location:admin.php");
			}
			else
			{
				$query=mysqli_query($con,"select * from login where email='$uid'");
				if($data=mysqli_fetch_array($query))
				{
					if($password==$data['password'])
					{
						$_SESSION['email']=$data['email'];
						$_SESSION['emailcommanusername']=$data['email'];
						$_SESSION['reg_id']=$data['reg_id'];
						$reg_id=$_SESSION['reg_id'];

						echo "$reg_id";
						echo $_SESSION['email'];
						echo $_SESSION['emailcommanusername'];
						$query22=mysqli_query($con,"select * from user_type where reg_id='".$reg_id."'");
						$data22=mysqli_fetch_array($query22);
						echo $uinfo;
						if($uinfo == 1)
						header("location:demo1.php");
						else
						header("location:demo2.php");
						
						
					}
						
				
					else
					{
						
					}
				}
				else
				{
					
				}
			}

			
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		label.error{
			color:red;
		}
	</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style1.css">
	<!-- --------------------------------------VALIDATION---------------------------------->
	<script type="text/javascript" language="javascript">
	</script>
<style>
.form-group
{
margin-bottom:0px;
}
.form-input
{
	height: 50px;
    border-bottom: 1px solid #5b8a5b;
}
body,td,th {
	font-size: medium;
}
.colorRed{
	font-weight: bold;
	color: red;	
}


.purpleColor{
	background-color: #8926AB;
	width: 100%;
	text-decoration: none;
	border:none;
}

input:hover[type="submit"] 
		{
		background-color: #8926AB;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body style="background-image:url(../img/a4.jpg)">
<br>
    <div class="main" >

        <section class="signup">
            
            <div class="container">
                <div class="signup-content" style="margin-bottom:10px; background-image:url(../img/bh.png)">
                    <form method="POST" id="signup-form" class="signup-form" action="">
                        <h2 class="form-title">Login Into Account</h2>
                        
		    <!--email-id---------------------------------------->				
			<div class="form-group"><tr><td><font color="black"><b>Email-Id</b></font></td><td colspan="2">
		   
                    <input type="email" class="form-control" autocomplete="off" placeholder="Email ID" id="emailid" name="txt_loginid" value=" <?php if(isset($uid)){echo $uid; } ?>"  /></td>			</div>
                    <?php 
                    if(isset($uidEmpty)){
                    	?>
                    	<p class="colorRed">Email Field Is empty</p>
						<?php
 		               }
        	        ?>
        	        <br>
			 <!--password---------------------------------------->				
			<div class="form-group">
			<tr><td><b>Password</b></td><td colspan="2">
	        	<input onBlur="checkkLength(this)"  type="password" autocomplete="off"  placeholder="Password"  class="form-control"                  id="password" name="txt_password" maxlength="10"/></td></tr>
								</div>
								  <?php 
                    if(isset($passwordEmpty)){
                    	?>
                    	<p class="colorRed">Password Field Is empty</p>
						<?php
 		               }
        	        ?>
				
			<br>
 <div class="form-group"><tr><td colspan="2">
 <input type="submit" name="btn_login" style="background-image:url(img1/bg.jpg);" id="submit" class="btn btn-primary purpleColor" value="LOGIN"/>
                       </div>
					</td></tr>	

					</table>
                    </form>
					
                    <p class="loginhere" style="margin-bottom:-48px;">
                        Forgot the password ?
						<a class="loginhere-link" href="forgetpassword.php?uinfo=<?php echo $uinfo;?>">Click Here</a>
                    </p> 					
                    <p class="loginhere">
                        Don't have an account ?
						<a class="loginhere-link" href="signup.php?uinfo=<?php echo $uinfo;?>">Signup Here</a>
                    </p> 

                </div> 
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js">
    		$(document).ready(function(){
 				alert("working");
});
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
$('form[id="signup-form"]').validate({
  rules: {
    txt_loginid: {
      required: true,
      email:true,
   },

 txt_password: {
      required: true,
      minlength:6,
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
<body>	
<footer class="page-footer font-small blue" style="background-image:url(img1/bg.jpg); background-repeat:no-repeat;background-size: 1800px; margin-top:250px; margin-bottom:-120px;">
  <div class="footer-copyright text-center py-3" style="margin-bottom:0px; margin-top:0px;"><p style="font-size:24px; color:#FFFFFF">Copyright By: Dhruv Thakkar, Kushan Somani and Nirmit Shah</p> 
  </div>
</footer>
  </body>
</html>