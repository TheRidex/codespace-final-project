<?php 
//Start the session
session_start();

//Check if the form was submitted
if(!isset($_SESSION[ 'user_id'])) {
    require ('login_tools.php') ; load(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Workshop 4</title>

    <!-- Bootstrap CSS -->
    <link rel="Stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .card{
            margin-bottom; 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><?php
    echo"{$_SESSION['first_name']} {$_SESSION['last_name']}";
    ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=>
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out<span class="sr-only"()></a>
            </li>
        </ul>    
    </div>    
</nav>
<div class="container">
    
</div>   
</body>
</html>