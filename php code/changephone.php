<?php

//avoid error notices, display only warnings:
error_reporting(0);

include("navbar_admin.php");
include('connection.php');

//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
	//connect to database:
	
	//Create an array for errors:
	$errors = array();
	
	//check for email address:
	if (empty($_POST['email']))
    {
		$errors[] = 'You forgot to enter your email!'; 
	}
    else
    {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
        //echo $e;
	}
     
    //check for phone number
    if (empty($_POST['old_number']))
    {
		$errors[] = 'You forgot to enter your current phone number!';
    }
    else
    {
        $oldNumber = mysqli_real_escape_string($dbc, trim($_POST['old_number']));
    }
    
    //check for phone number
    if (empty($_POST['new_number']))
    {
		$errors[] = 'You forgot to enter your new phone number!';
    }
    else
    {
        $newNumber = mysqli_real_escape_string($dbc, trim($_POST['new_number']));
    }
     
     
    if (($_POST['old_number']) == ($_POST['new_number']))
    {
		$errors[] = 'Your new number is the same as your old number, change it and try again.';
    }
      
     
    //procedd if no errors
    if(empty($errors))
    {    
        mysqli_query($dbc, "UPDATE users SET phone='$newNumber' WHERE (email='$e' AND phone='$oldNumber')");
        if(mysqli_affected_rows($dbc) == 1)
        {
            echo " <br /> <p>The phone number has been sucessfully changed! </p>";
            mysqli_close($dbc);
        }
        else
        {
            echo " <br /> <p>Your email and/or current phone number does not match our records! </p>";
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
    <title>Change Phone</title>
    <meta charset ="utf-8"/>
           
</head>
<body>
    
    <h1>Update your Phone</h1>
    
	<form action="changephone.php" method="post">
        
    <p>Email: <input type="text" name= "email" size="40" maxlength="50" /></p>
    <p>Current Phone Number: <input type="text" name= "old_number" size="40" maxlength="50" /></p>
    <p>New Phone Number: <input type="text" name= "new_number" size="40" maxlength="50" /></p>
    <input type= "submit" name="submit" value="Update Phone" />
    	   
	</form>

</body>
</html>

