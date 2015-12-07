
<?php
error_reporting(0);
session_start();
  if($_SESSION["storedEmail"] != ''){
    
        if($_SESSION["storedUserType"] == 2)
        {
            include("navbar_admin.php");
        }
        else{
            include("navbar.php");
        }
   }else{
   include("navbar.php");
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/structurecss.css">
  <title>My Profile</title>
</head>

<link href="../css/structurecss.css" rel="stylesheet">
 

<div id="wrapper">
  <div id="sidebar-wrapper" class="col-md-2">
            <div id="sidebar">
                
            </div>
        </div>
        <div id="main-wrapper" class="col-md-10 pull-right">
            <div id="main">
              <div class="page-header">
                <h3>Login</h3>
              </div>
              <p><form action="login.php" method="post">
    
    <p>Email: <input type="text" name= "login_email" size="40" maxlength="50" /></p>
	<p>Password: <input type="password" name="login_password" maxlength="50" id = "initial"></textarea> <a href = "forgotpassword.php">Forgot Password </a> </p> 
    <input type= "submit" name="submit" value="Login" />
    	   
	</form></p>
    <p>No account? <a href='userform.php'>Register Here</a></p>
            </div>
          
            <div class="col-md-12 footer">
             
            </div>
          
        </div>
</div>