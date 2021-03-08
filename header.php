<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="index.php"><img src="img/logo.png" alt="logo" width="60" /></a></li>
            <li class="item"><a href="index.php">Home</a></li>
            <li class="item"><a href="#">Attendance</a></li>
            <li class="item"><a href="about.php">About</a></li>
            <li class="item"><a href="contact.php">Contact Us</a></li>
            </li>
            <li class="item button"><a href="login.php">login</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/header.js"></script>
    
<?php 
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');        
    }

?>
