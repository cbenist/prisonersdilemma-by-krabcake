<html>
<head>
    <title>Userform</title>
    <a href = "output.php">Check all records from database. </a> 
</head>
<body>
	<form action="processing.php" method="post">
	<p>First Name: <input type="text" name="fname" size="20" maxlength="50" /></p>
	<p>Last Name: <input type="text" name="lname" size="20" maxlength="50" /></p>
    <p>Email: <input type="text" name= "email" size="20" maxlength="50" /></p>
    <p>Phone: <input type="text" name="phone" size="20" maxlength="50" /></p>
	<p>Password: <input type="password" name="password" maxlength="50"></textarea></p>	
		
	<p><input type="submit" name="submit" value="Submit" /></p>	   
	</form>
</body>
</html>
