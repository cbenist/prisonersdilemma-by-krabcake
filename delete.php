<?php

//avoid error notice, display only warnings:
error_reporting(0);
$showDivFlag=true;
include('navbar_admin.php');

//check if user submitted form:
if($_SERVER['REQUEST_METHOD']=='POST'){
    
//connect to database:
include('connection.php');
    
//get input email value from form:
    $getid = mysqli_real_escape_string($dbc, trim($_POST['user_id']));
    
//delete users where id=$getid:
    mysqli_query($dbc, "DELETE FROM users WHERE id='$getid'");
    
    echo "<p>The user has been sucessfully deleted! </p>";
    $showDivFlag=false;
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
        <h3> Are you sure you want to delete this user? </h3>
      <form method="post" action="delete.php">
        <p>User ID:<input type ='text' name='user_id' value="<?php echo $_GET['user_id']; ?>" /></p>
        <p>First Name:<input type ='text' name='first_name' value="<?php echo $_GET['fname']; ?>" /></p>
        <p>Last Name:<input type ='text' name='last_name' value="<?php echo $_GET['lname']; ?>" /></p>
        <p><input type ='submit' name='submit' value='Yes, Delete User Now!'    /></p>
        <p><a href="output.php">Don't Delete User, Go Back</a></p>
      </form>
    </div></p>
            </div>
          
            <div class="col-md-12 footer">
              <ul class="nav navbar-nav"><li><a href="">Link</a></li><li><a href="">Link</a></li><li><a href="">Link</a></li></ul>
            </div>
          
        </div>
</div>