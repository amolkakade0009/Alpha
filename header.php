<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALPHA</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css"
        integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous" />
</head>

<body>
    <!-- Navigation bar-->
    <main class='main-content'>
        <nav class="navbar">
            <a href="" class="navbar__logo">ALPHA</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <div class="navbar__menu">
                <a href="index.php" class="navbar__link">Home</a>
                <?php
                if ($_SESSION['role'] == 'ADMIN') {
                    ?>
                    <a href="user-list.php" class="navbar__link">User List</a>
                    <?php
                }
                ?>
                <a href="services.php" class="navbar__link">Services</a>
                <a href="plans.php" class="navbar__link">Plans</a>
                <a href="trainers.php" class="navbar__link">Trainers</a>
                <a href="gallary.php" class="navbar__link">Alpha Gallery</a>
                <a href="bmiHome.php" class="navbar__link">BMI Calculator</a>
                <a href="proteinSupplement.php" class="navbar__link">Protein & Supplement</a>
                <a href="location.php" class="navbar__link">Location</a>
                <?php
                if (!$loggedin) {
                    echo '<a href="signup.php" class="navbar__link">Sign in</a>
                    <a href="login.php" class="navbar__link">Login</a>';
                } ?>
                <?php
                if ($loggedin) {
                    echo '<a href="logout.php" class="navbar__link">Logout</a>';
                } ?>
            </div>
        </nav>