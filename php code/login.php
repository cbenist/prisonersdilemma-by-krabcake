<?php

session_start();
error_reporting(0);
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
            $dbpass = $row['pw'];
            $dbfirstname = $row['first_name'];
            $usertype = $row['user_type'];
            $idVar = $row['Id'];
        }

        //create condition to check if email and password are equal to the returned row	
        if($login_email==$dbemail)
        {
            if($login_password==$dbpass)
            {	if($usertype==1)
                {
                    include("navbar_admin.php");
                    echo " </br> Welcome ".$dbfirstname.", you are in the wonderland with administrative priveleges! <br>";
                }
                else
                {
                    include("navbar.php");
                    echo " </br> Welcome ".$dbfirstname.", you are in the wonderland! <br>";
                    $_SESSION["storedID"] = $idVar;
                }
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

?>

<html>
     <title>Login</title>
</html>
