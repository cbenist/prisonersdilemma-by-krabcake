<?php
    #include("connection.php");
    session_start();

if($_SESSION["storedUserType"] == 2)
{
    include("navbar_admin.php");
}
else{
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
  <title>Prisoner's Dilemma</title>
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
                <h3>Prisoner's Dilemma</h3>
              </div>
              <p> This is the content section. Just fill it with whatever you want. I tried making this as generic as possible so it could be adapted to all of the pages. I don't remember the colors we had said so just make it whatever you like in the css file.</p>
            </div>
          
            <div class="col-md-12 footer">
              
            </div>
          
        </div>
</div>