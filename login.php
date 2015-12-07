<?php

session_start();
#error_reporting(0);
include("connection.php");
//grab values email and password from login form

$login_email = $_POST['login_email']; //must matching with the name in the login form
$login_password = $_POST['login_password'];

//create the query and number of rows returned from the query
$query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$login_email."'");
$numrows = mysqli_num_rows($query);
// if user clicked submit
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    //create condition to check if there is 1 row with that email
    if($numrows != 0)
    {
        //grab the email and password from that row returned before
        while($row = mysqli_fetch_array($query))
        {	
            $dbemail = $row['email']; //must matching with the field name in your database table;
            $dbpass = $row['password'];
            $dbfirstname = $row['first_name'];
            $usertype = $row['user_type'];
            $idVar = $row['id'];
            $online = $row['netstat'];
        }

        //create condition to check if email and password are equal to the returned row	
        if($login_email==$dbemail)
        {
            if($login_password==$dbpass)
            {	
                    $_SESSION["storedID"] = $idVar;
                    $_SESSION["storedEmail"] = $dbemail;
                    $_SESSION["storedUserType"] = $usertype;
                    $_SESSION["online"] = $online;
                    ini_set('session.gc_maxlifetime', 1800);
                    session_set_cookie_params(1800);
                    $q = "UPDATE users SET netstat='online' WHERE email = '" .$login_email."'";
                    $r = mysqli_query($dbc, $q);
            }
            else
            {
                echo "your password is incorrect!";
            }
        }
        else
        {
            echo "your email is incorrect!";
        }

    }
    else
    {
        echo "Invalid credentials! If you are not registered please register below...";
    }
}
else
{
	echo "Please Login...";
}

header('Location: home.php');

?>
<html></html>