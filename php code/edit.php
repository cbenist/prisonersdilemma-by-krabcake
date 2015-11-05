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
     
    //check phone number 
    if (empty($_POST['new_number']))
    {
		$n = mysqli_real_escape_string($dbc, trim($_POST['phone']));
        mysqli_query($dbc, "UPDATE users SET phone='$n' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$nn = mysqli_real_escape_string($dbc, trim($_POST['new_number']));
        mysqli_query($dbc, "UPDATE users SET phone='$nn' WHERE id='$getid'");
	}  
     
    //check current password:
	if (empty($_POST['new_password']))
    {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pw']));
        mysqli_query($dbc, "UPDATE users SET pw='$p' WHERE id='$getid'");
        $count++;
	}
    else
    {
		$np = mysqli_real_escape_string($dbc, trim($_POST['new_password']));
        mysqli_query($dbc, "UPDATE users SET pw='$np' WHERE id='$getid'");
	}
    
    if($count == 5)
    {
        echo " <br /> <p>No updates have been made! </p>";
    }
    else
    {
        echo " <br /> <p>The user data has been sucessfully updated! </p>";
    }
    
    $showDivFlag=false;
    mysqli_close($dbc);
 } 
 
?>

<html>
    <head>
        <title>Edit User</title>
    </head>
    <body>
        
    <div id="formDiv" <?php if ($showDivFlag===false){?> style="display:none"<?php } ?>>
        <h3> Are you sure you want to edit this user? </h3>
      <form method="post" action="edit.php">
        <p>User ID:<input type ='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>
        <p>Current First Name:<input type ='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /> New First Name: <input type="text" name= "new_first_name" size="40" maxlength="50" /></p>
        <p>Current Last Name:<input type ='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /> New Last Name: <input type="text" name= "new_last_name" size="40" maxlength="50" /></p>
        <p>Current Email:<input type ='text' name='email' value="<?php echo $_GET['email']; ?>" /> New email: <input type="text" name= "new_email" size="40" maxlength="50" /></p>
        <p>Current Phone Number:<input type ='text' name='phone' value="<?php echo $_GET['phone']; ?>" /> New Phone Number: <input type="text" name= "new_number" size="40" maxlength="50" /></p>
        <p>Current Password:<input type ='text' name='pw' value="<?php echo $_GET['password']; ?>" /> New Password: <input type="text" name= "new_password" size="40" maxlength="50" /></p>
        <p><input type ='submit' name='submit' value='Yes, Update Changes to User Now!'    /></p>
        <p><a href="output.php">Don't Edit User, Go Back</a></p>
      </form>
    </div>    
    </body>
</html>
