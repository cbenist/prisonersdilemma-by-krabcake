<?php
include("connection.php");
session_start();

$q = "UPDATE users SET netstat='offline' WHERE username = '" .$_SESSION['storedEmail']."'";
    $r = mysqli_query($dbc, $q);




?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();

header("Location: index.php");
?>

</body>
</html>