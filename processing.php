<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
//if values are not empty, proceed to store them in the database
$query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."'");
$numrows = mysqli_num_rows($query);
if($numrows == 0)
{
    
        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
                mysqli_query($dbc, "INSERT INTO users(first_name, last_name, email, password, score) 
                VALUES ('$fname', '$lname', '$email', '$password', '0')");

                header('Location: index.php');

                }else{		
                    echo "ERROR: you left some values in blank! ";	
                }
}else{
echo "<strong>ERROR: user already exists!</strong>";
}
}
?>
