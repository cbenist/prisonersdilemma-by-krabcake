<?php
    
    include("navbar_admin.php");
    include("connection.php");
    echo "<br />";
	$r = mysqli_query($dbc, "SELECT * FROM users");

    echo "<br>";

    echo "<table align='center' border='1' cellspacing='3' cellpadding='3' width='7'>
    <tr>
        <td align='left'><b>Edit</b></td>
        <td align='left'><b>Delete</b></td>
        <td align='left'><b>Name</b></td>
        <td align='left'><b>Email</b></td>
    </tr>";
	
	while ($row = mysqli_fetch_array($r))
    {
        echo "<tr>
           
            <td align='left'><a href='edit.php?user_id=".$row['Id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&email=".$row['email']."&phone=".$row['phone']."&password=".$row['pw']."'> Edit</a> </td>
            <td align='left'><a href='delete.php?user_id=".$row['Id']."&fname=".$row['first_name']."&lname=".$row['last_name']."'> Delete</a></td>
            <td align='left'>".$row['last_name'].", ".$row['first_name']."</td> 
            <td align='left'>".$row['email']."</td>
     
        </tr>";
    } //end while
        
        //echo "</table>"
		//echo $row['first_name']."/".$row['email'];
		//echo "<br>";
	   
mysqli_close($dbc); //always close the connection for security
//echo "database connection closed."; //this echo is for testing stage only, no need to show it to user. 

?>

<html>
     <title>Output</title>
</html>