<?php
$showAlert = false;
$showError = false;
require'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "users";
    // $conn = mysqli_connect($server, $username, $password, $database);
    // if (!$conn) {
    //     die("Error" . mysqli_connect_error());
    // }

    $conn = connect();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    //check where user already exists
    $existSql = "SELECT * FROM `users` WHERE username= '$username'";
    $result = mysqli_query($conn, $existSql);
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($conn));
    }
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username Already Exists";
    } else {

        if ($password == $confirm_password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: login.php");
            }
        } else {
            $showError = "Password does not match";
        }
    }
    closeConnection($conn);
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
    <title>ALPHA Signup Page</title>
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
    if ($showAlert) {
        echo '<div class="alert">
        <strong>Success!</strong>Your account is now created and you can login
    </div>';
    }
    /*if($showError){
        echo'<div class="alert">
        <strong>Error!</strong> '. $showError.'
        </div>';
    } */
    ?>

    <div class="container">
        <form id="signupForm" action="signup.php" method="POST" onsubmit="return validateForm()">
            <h2>SignUp</h2>
            <label for="username">Username:</label>
            <input type="text" maxlength="10" id="username" name="username" autofocus required>
            <label for="password">Password:</label>
            <input type="password" maxlength="100" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <small class="alert"></small>
            <?php
            if ($showError) {
                echo '<div class="alert">
            <strong>Error!</strong> ' . $showError . '
            </div>';
            }
            ?>
            <button type="submit">SignUp</button>
            <div class="access-status">
                <p>Already have an account?</p>
                <a href="login.php">Log in</a>
            </div>
        </form>
    </div>
</body>
<script>

    <script>
        function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;
        var alertElement = document.querySelector('.alert');

        // Regular expression for validating username (alphanumeric, 4-10 characters)
        var usernameRegex = /^[a-zA-Z0-9]{4, 10}$/;

        // Regular expression for validating password (alphanumeric, 4-10 characters)
        var passwordRegex = /^[a-zA-Z0-9]{4, 10}$/;

        if (!username.match(usernameRegex)) {
            alertElement.innerText = "Username must be alphanumeric and between 4-10 characters.";
        return false;
        }

        if (!password.match(passwordRegex)) {
            alertElement.innerText = "Password must be alphanumeric and between 4-10 characters.";
        return false;
        }

        if (password !== confirm_password) {
            alertElement.innerText = "Passwords do not match.";
        return false;
        }

        return true;
    }
</script>

</html>