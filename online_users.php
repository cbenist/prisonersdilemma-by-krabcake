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
 echo "<br/>";
    $r = mysqli_query($dbc, "SELECT * FROM users WHERE netstat='online'");

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
                <h3>Online Users</h3>
              </div>
                
<?php
    
echo "<table align='center' width=80% border='1' cellspacing='3' cellpadding='3' width='7'>
    <tr>
        <td align='left'><b>Name</b></td>
        <td align='left'><b>Email</b></td>
        <td align='left'><b>Score</b></td>
    </tr>";

while ($row = mysqli_fetch_array($r))
    {
        echo "<tr>
           
            <td align='left'>".$row['last_name'].", ".$row['first_name']."</td> 
            <td align='left'>".$row['email']."</td>
            <td align='left'>".$row['score']."</td>
            
        </tr>";
    } 
?>
            </div>
          
          
        </div>
</div>
