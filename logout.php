<?php
include("connection.php");
session_start();

    $q = "UPDATE users SET netstat='offline' WHERE email='" .$_SESSION['storedEmail']."'";
    $r = mysqli_query($dbc, $q);


// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<body>

</body>
</html>