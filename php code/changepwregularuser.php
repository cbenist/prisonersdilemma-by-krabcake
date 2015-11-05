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
        mysqli_query($dbc, "UPDATE users SET pw='$np' WHERE (email='$e' AND pw='$p' AND Id='$temp')");
        
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

<html>
<head>
    <title>Change Password</title>
    <meta charset ="utf-8"/>      
</head>
<body>
    
    <h1>Change your password</h1>
    
	<form action="changepwregularuser.php" method="post">
        
    <p>Email: <input type="text" name= "email" size="40" maxlength="50" /></p>
	<p>Current Password: <input type="password" name="pass" maxlength="50" ></textarea></p> 
    <p>New Password: <input type="password" name="pass1" maxlength="50" ></textarea></p> 
    <p>Confirm Password: <input type="password" name="pass2" maxlength="50" ></textarea></p> 
    <input type= "submit" name="submit" value="Change Password" />
    	   
	</form>

</body>
</html>