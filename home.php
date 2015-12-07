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
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/structurecss.css">
  <title>Prisoner's Dilemma Home</title>
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
                <h3>Home</h3>
              </div>
              <p>Prisoner's Dilemma is a game of choices. You and a partner are paired together. You must choose whether or not to cooperate with your partner. There are four possible outcomes for this scenario: </p>
                <ol>
                    <li>You defect and your partner cooperates (5pts)</li>
                    <li>You cooperate and your partner cooperates (3pts)</li>
                    <li>You defect and your partner defects (1pt)</li>
                    <li>You cooperate and your partner defects (0pts)</li>
                </ol>
                <p> This "game" was originally framed by Merrill Flood and Melvin Dresher working at RAND in 1950. You are one of two prisoners from the same criminal orginisation that are both held in solitary confinement with no way to communicate with each other. You are given the option to save yourself from jail by betraying your partner and he will serve both sentences. What you're not told is that your partner is given the same choice. </p>
            </div>
          
          
        </div>
</div>