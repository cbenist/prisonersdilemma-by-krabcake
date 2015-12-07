<?php

//avoid error notices, display only warnings:
error_reporting(0);
session_start();

include("navbar.php");
include('connection.php');

//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	
	//Create an array for errors:
	$errors = array();
	
	//check for email address:
	if (empty($_POST['email'])){
		$errors[] = 'You forgot to enter your email!';
	}else{
$e = mysqli_real_escape_string($dbc, trim($_POST['email'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
        
	}
     
    //check current password:
	if (empty($_POST['pass'])){
		$errors[] = 'You forgot to enter your current password!';
	}else{
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}
          
	//check for a new password and compare it with confirmed password:
	if (!empty($_POST['pass1'])){
		if ($_POST['pass1'] != $_POST['pass2']){
			$errors[] = 'Your new passwords do not match the confirmed password!';
		}else{
			$np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	}else{
		$errors[] = 'You forgot to enter your new password!';
	}
     
    //$getInfo="SELECT Id FROM users WHERE (email='$e')";
    //$query = mysqli_query($dbc, $getInfo);
    //$row = mysqli_fetch_array($query);
    //$userID = $row['Id'];
    $temp = $_SESSION["storedID"];
    
	//if there is no errors:
	if(empty($errors))
    { 
        mysqli_query($dbc, "UPDATE users SET password='$np' WHERE email='$e' AND id='$temp'");
        
        if(mysqli_affected_rows($dbc) == 1)
        { 
            echo " <br /> <p>The password has been sucessfully changed! </p>";
            mysqli_close($dbc);
        }
        else
        {
            echo " <br /> <p>Your email and/or current password does not match our records! </p>";
        }     
    }
    else
    {
		echo "<br /> <br /> Error! The following error(s) occurred: <br />";
		foreach($errors as $msg)
        {
			echo $msg."<br />";
		}
	}  
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
  <title>Change User Password</title>
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
                <h3>Change Password</h3>
              </div>
              
    
	<form action="changepwregularuser.php" method="post">
        
    <p>Email: <input type="text" name= "email" size="40" maxlength="50" /></p>
	<p>Current Password: <input type="password" name="pass" maxlength="50" /></p> 
    <p>New Password: <input type="password" name="pass1" maxlength="50" /></p> 
    <p>Confirm Password: <input type="password" name="pass2" maxlength="50" /></p> 
    <input type= "submit" name="submit" value="Change Password" />
    	   
	</form></p>
            </div>
          
            <div class="col-md-12 footer">
              <ul class="nav navbar-nav"><li><a href="">Link</a></li><li><a href="">Link</a></li><li><a href="">Link</a></li></ul>
            </div>
          
        </div>
</div>