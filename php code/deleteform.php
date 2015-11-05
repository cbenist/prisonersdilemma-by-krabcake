
<?php

//avoid error notices, display only warnings:
error_reporting(0);

include("navbar_admin.php");

//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
	//connect to database:
	include('connection.php');
	
	echo "<br />";
	
	//Create an array for errors:
	$errors = array();
	
	//check for email address:
	if (empty($_POST['email'])){
		$errors[] = 'You forgot to enter your email!';
	}else{
$e = mysqli_real_escape_string($dbc, trim($_POST['email'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
        
    
    //echo $e;
	}	
	
	//if there is no errors:
	if(empty($errors)){
		//create query and return number of rows where email = $e and password = $p:
		$q = "SELECT Id FROM user WHERE (email='$e')"; //query the database
		$r = mysqli_query($dbc, $q); //store the query result which are all the IDs that matching the email
        
        mysqli_query($dbc, "DELETE FROM users WHERE email='$e'");
    
        echo " <br /> <p>The user has been sucessfully deleted! </p>";
        
		$num = mysqli_num_rows($r); //return how many records matched; should be one
        
 }
     mysqli_close($dbc);
 }

?>


<html>
<head>
    <title>Delete User</title>
    <meta charset ="utf-8"/>     
</head>
<body>
    
	<form action="deleteform.php" method="post">
    
    <h2>Please type in the email of the user to be deleted: </h2>
    <input type="text" name= "email" size="40" maxlength="50" />
	<input type= "submit" name="submit" value="Delete This User" />
    	   
	</form>

</body>
</html>