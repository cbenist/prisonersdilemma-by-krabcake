<?php 

if($_SESSION["storedEmail"] != '')
{
echo "
<div id=header class='navbar navbar-inverse navbar-fixed-top'>
    <div class='navbar-header'>
        <button class='navbar-toggle collapsed' type=button data-toggle=collapse data-target='.navbar-collapse'>
            <i class='icon-reorder'></i>
        </button>
        <a class='navbar-brand' href='home.php'>
            Prisoner's Dilemma
        </a>
    </div>
    <nav class='collapse navbar-collapse'>
        <ul class='nav navbar-nav'>
            
            
            <li><a href='userprofile.php'>User Profile</a></li>
            <li><a href='game.php'>Game</a></li>
            <li><a href='online_users.php'>Who's Online</a></li>
            
        </ul>
        <ul class='nav navbar-nav pull-right'>
            <li class='dropdown'>
                <a href='userprofile.php' id='nbAcctDD' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-user'></i>".$_SESSION['storedEmail']."<i class='icon-sort-down'></i></a>  
            </li>
            <li><a href=logout.php>Log Out</a></li>
        </ul>
    </nav>
</div>";
}
else
{
echo "
<div id=header class='navbar navbar-inverse navbar-fixed-top'>
    <div class='navbar-header'>
        <button class='navbar-toggle collapsed' type=button data-toggle=collapse data-target='.navbar-collapse'>
            <i class='icon-reorder'></i>
        </button>
        <a class='navbar-brand' href='home.php'>
            Prisoner's Dilemma
        </a>
    </div>
    <nav class='collapse navbar-collapse'>
        <ul class='nav navbar-nav'>
            
            <li><a href='userform.php'>Register</a></li>
            <li><a href='userprofile.php'>User Profile</a></li>
            <li><a href='game.php'>Game</a></li>
            <li><a href='online_users.php'>Who's Online</a></li>
            
        </ul>
        <ul class='nav navbar-nav pull-right'>
            <li class='dropdown'>
                <a href='userprofile.php' id='nbAcctDD' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-user'></i>Username<i class='icon-sort-down'></i></a>  
            </li>
            <li><a href=index.php>Log In</a></li>
        </ul>
    </nav>
</div>";
}
?>