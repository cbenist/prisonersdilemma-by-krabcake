<?php
    #include("connection.php");
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
include('connection.php');
$r = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$_SESSION["storedEmail"]."'");
$row = mysqli_fetch_array($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/structurecss.css">
  <title>User Profile</title>
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
                <h3>User Profile</h3>
              </div>
                <?php if($_SESSION['storedUserType'] == 2){
echo "<h4>Admin User</h4>";
} ?>
                <p>Name: <?php echo " ".$row['first_name'].", ".$row['last_name'].""; ?></p>
                <p>Email: <?php echo " ".$row['email']." "; ?></p>
                <p>Password: <?php echo " ".$row['password']." "; ?></p>
                <p>Score: <?php echo " ".$row['score']." "; ?></p>
            </div>
          
          
        </div>
</div>