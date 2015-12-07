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
  <title>Register</title>
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
                <h3>Register Here!</h3>
              </div>
              <p> <form action="processing.php" method="post">
	<p>First Name: <input type="text" name="fname" size="20" maxlength="50" /></p>
	<p>Last Name: <input type="text" name="lname" size="20" maxlength="50" /></p>
    <p>Email: <input type="text" name= "email" size="20" maxlength="50" /></p>
	<p>Password: <input type="password" name="password" maxlength="50"></p>
    <p>Section: <select name=section>
        <option value="BIOL">BIOL</option>
        <option value="PSYC">PSYC</option>
        </select></p>
    <p>Semester: <select>
        <option value="Spring2016">Spring2016</option>
        <option value="Summer2016">Summer2016</option>
        <option value="Fall2016">Fall2016</option>
        </select></p>
		
	<p><input type="submit" name="submit" value="Submit" /></p>	   
	</form></p>
            </div>
          
            <div class="col-md-12 footer">
              
            </div>
          
        </div>
</div>