<?php
#Access session.
session_start();
#Redirect if not logged in
if(!isset($_SESSION[ 'user_id' ])) {require ('login_tools.php'); load();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 5</title>

    <!--Bootstrap css-->
    <link rel="Stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .card{
        margin-top: 30px;
        margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">
            <i class="fa fa-home fa-fw" aria-hidden="true"></i> 
            <?php
            echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";
            ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart fa-fw" aria-controls="navbar"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out <span class="sr-only"> ()</span></a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container"></div>
    
</body>
</html>