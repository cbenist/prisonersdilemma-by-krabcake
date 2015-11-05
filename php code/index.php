
<html>
<head>
    <title>Registration Form with Validation</title>
    <meta charset ="utf-8"/>
    
        
</head>
<body>
    
    <h1>Welcome to the Wonderland!</h1>
    <p>New to this website, please  <a href = "userform.php">click here to register </a> </p>
    <p>Returning members, please sign in with your email and password.</p>
    
	<form action="login.php" method="post">
    
    <p>Email: <input type="text" name= "login_email" size="40" maxlength="50" /></p>
	<p>Password: <input type="password" name="login_password" maxlength="50" id = "initial"></textarea> <a href = "forgotpassword.php">Forgot Password </a> </p> 
    <input type= "submit" name="submit" value="Login" />
    	   
	</form>


</body>
</html>
