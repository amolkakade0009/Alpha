<?php
header("login.php");
include("db.php");
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];



    // $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $conn = connect();
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['userId'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                // $_SESSION['password'] = $password;
                // closeConnection($conn);
                header("location: index.php");

            }else {
                closeConnection($conn);
                $showError = "Invalid User";
            }
        }

    } else {
        closeConnection($conn);
        $showError = "Invalid User";
    }
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALPHA login Page</title>
    <link rel="stylesheet" href="signupandlogininStyles.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">
        <a href="" class="navbar__logo">ALPHA</a>
        <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="navbar__menu">
            <!-- <a href="" class="navbar__link">Home</a>
                <a href="services.php" class="navbar__link">Services</a>
                <a href="plans.php" class="navbar__link">Plans</a>
                <a href="trainers.php" class="navbar__link">Trainers</a>
                <a href="gallary.php" class="navbar__link">Alpha Gallery</a>
                <a href="bmiHome.php" class="navbar__link">BMI Calculator</a> -->
            <?php
            if (!$loggedin) {
                echo '<a href="signup.php" class="navbar__link">Sign Up</a>
                    <a href="login.php" class="navbar__link">Login</a>';
            } ?>
            <?php
            if ($loggedin) {
                echo '<a href="logout.php" class="navbar__link">Logout</a>';
            } ?>
        </div>
    </nav>
    <?php
    if ($login) {
        echo '<div class="alert">
        <strong>Success!</strong>Your are logged in
    </div>';
    }
    // if($showError){
    //     echo'<div class="alert">
    //     <strong>Error!</strong> '. $showError.'
    // </div>';
    // } 
    ?>
    <div class="container">
        <form action="login.php" method="POST">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" autofocus required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <?php
            if ($showError) {
                echo '<div class="alert">
            <strong>Error!</strong> ' . $showError . '
            </div>';
            }
            ?>
            <button type="submit">Login</button>
            <div class="access-status">
                <p>New to ALPHA</p>
                <a href="signup.php">Sign up</a>
            </div>

        </form>
    </div>
</body>

</html>