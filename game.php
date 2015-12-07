<?php
    include("connection.php");
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
              <form action="game_processing.php" method='post'>
                <input type="submit" class="button" name="coop" value="Cooperate" />
                  <input type="submit" class="button" name="betray" value="Defect" /><br/>
                <label name="score">Score: <?php echo "".$row["score"].""; ?></label>
                </form>
                
            </div>
          
            <div class="col-md-10 footer" style="text-align:center">
              <audio controls>
                  <source src="audio/bgm.wav"></source>
              </audio>
            </div>
          
        </div>
</div>
</html>
