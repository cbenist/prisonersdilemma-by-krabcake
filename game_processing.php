<?php 
    include('connection.php');
    session_start();
    $playerchoice='cooperate';
    $computerchoice='cooperate';    
    $row = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE email='".$_SESSION['storedEmail']."'"));
    $score = $row['score'];
    $nscore;
        
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        if(isset($_POST['coop'])){
            echo "player cooperates";
            $playerchoice = 'cooperate';
        }
        else{
            echo "player betrays";
            $playerchoice = 'betray';
        }
        
    }


    if(rand()%2 == 0)
    {
        echo "computer cooperates";
        $computerchoice = 'cooperate';
    }
    else{
        echo "computer betrays";
        $computerchoice = 'betray';
    }

    if($playerchoice == 'cooperate'){
        if($computerchoice == 'cooperate'){
            $nscore = $score + 3;
        }else{
            $nscore = $score + 0;
        }
    }
    else{
        if($computerchoice == 'cooperate'){
            $nscore = $score + 5;
        }else{
            $nscore = $score + 1;
        }
    }

    $q = mysqli_query($dbc, "UPDATE users SET score='".$nscore."' WHERE email='".$_SESSION['storedEmail']."'");

header('Location: game.php')
?>