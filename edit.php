<?php

//avoid error notices, display only warnings:
error_reporting(0);
$showDivFlag=true;

include("navbar_admin.php");
include('connection.php');

//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    $count = 0;
     
    //get input email value from form:
    $getid = mysqli_real_escape_string($dbc, trim($_POST['user_id'])); 
     
     echo $_POST['new_score'];
     
    //check firstname 
    if (empty($_POST['new_first_name']))
    {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
		mysqli_query($dbc, "UPDATE users SET first_name='$fn' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$nfn = mysqli_real_escape_string($dbc, trim($_POST['new_first_name']));
        mysqli_query($dbc, "UPDATE users SET first_name='$nfn' WHERE id='$getid'");
	} 
     
    //check last name 
    if (empty($_POST['new_last_name']))
    {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
		mysqli_query($dbc, "UPDATE users SET last_name='$ln' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$nln = mysqli_real_escape_string($dbc, trim($_POST['new_last_name']));
        mysqli_query($dbc, "UPDATE users SET last_name='$nln' WHERE id='$getid'");
	} 
     
    //check for email address:
	if (empty($_POST['new_email']))
    {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        mysqli_query($dbc, "UPDATE users SET email='$e' WHERE id='$getid'");
        $count++;
	}
    else
    {
        $ne = mysqli_real_escape_string($dbc, trim($_POST['new_email']));
        mysqli_query($dbc, "UPDATE users SET email='$ne' WHERE id='$getid'");
	} 
     
    //check current password:
	if (empty($_POST['new_password']))
    {
		$p = mysqli_real_escape_string($dbc, trim($_POST['password']));
        mysqli_query($dbc, "UPDATE users SET password='$p' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$np = mysqli_real_escape_string($dbc, trim($_POST['new_password']));
        mysqli_query($dbc, "UPDATE users SET password='$np' WHERE id='$getid'");
	}
    
     //check current admin:
	if (empty($_POST['new_admin']))
    {
		$ut = mysqli_real_escape_string($dbc, trim($_POST['admin']));
        mysqli_query($dbc, "UPDATE users SET user_type='$ut' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$nut = mysqli_real_escape_string($dbc, trim($_POST['new_admin']));
        mysqli_query($dbc, "UPDATE users SET user_type='$nut' WHERE id='$getid'");
	}
     if (isset($_POST['new_score']))
     {
         echo "zero" ;
        $sc = mysqli_real_escape_string($dbc, trim($_POST['score']));
         mysqli_query($dbc, "UPDATE users SET score='$sc' WHERE id='$getid'");
         $count++;
     }
     else
     {
         $nsc;
         
         if($_POST['new_score'] == 0)
         {
             echo "correct";
             $nsc = 0;
         }
         else{
            $nsc = mysqli_real_escape_string($dbc, trim($_POST['new_score']));
             echo "false";
         }
        mysqli_query($dbc, "UPDATE users SET score='$nsc' WHERE id='$getid'");
     }
     
    if($count == 6)
    {
        echo " <br /> <p>No updates have been made! </p>";
    }
    else
    {
        echo " <br /> <p>The user data has been sucessfully updated! </p>";
    }
    
    $showDivFlag=false;
    mysqli_close($dbc);
     header('Location: output.php');
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
                <h3>Admin or whatever I dunno how you want this structured</h3>
              </div>
              <p> <div id="formDiv" <?php if ($showDivFlag===false){?> style="display:none"<?php } ?>>
        <h3> Are you sure you want to edit this user? </h3>
      <form method="post" action="edit.php">
        <p>User ID:<input type ='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>
        <p>Current First Name:<input type ='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /> New First Name: <input type="text" name= "new_first_name" size="40" maxlength="50" /></p>
        <p>Current Last Name:<input type ='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /> New Last Name: <input type="text" name= "new_last_name" size="40" maxlength="50" /></p>
        <p>Current Email:<input type ='text' name='email' value="<?php echo $_GET['email']; ?>" /> New email: <input type="text" name= "new_email" size="40" maxlength="50" /></p>
        <p>Current Password:<input type ='text' name='password' value="<?php echo $_GET['password']; ?>" /> New Password: <input type="text" name= "new_password" size="40" maxlength="50" /></p>
          <p>Current Score: <input type='text' name='score' value="<?php echo $_GET['score']; ?>" /> New Score(lowest value is 1): <input type='text' name="new_score" /></p>
          <p>Current Admin Status(2 for yes, 1 for no):<input type ='text' name='admin' value="<?php echo $_GET['user_type']; ?>" /> New Admin Status(2 for yes, 1 for no): <input type="text" name= "new_admin" size="40" maxlength="50" /></p>
        
          
        <p><input type ='submit' name='submit' value='Yes, Update Changes to User Now!'    /></p>
        <p><a href="output.php">Don't Edit User, Go Back</a></p>
      </form>
    </div> </p>
            </div>
          
            <div class="col-md-12 footer">
              
            </div>
          
        </div>
</div>