<?php
require 'db.php';

if (isset($_POST['userName'])) {
    // Get the userName parameter value
    $userName = $_POST['userName'];
    $conn = connect();
    $sql = "DELETE FROM users WHERE username = '$userName'";
    mysqli_query($conn, $sql);

    // Return a success message
    echo "User $userName deleted successfully";
} else {
    // Return an error message if userName parameter is not set
    echo "Error: userName parameter is not set";
}
?>