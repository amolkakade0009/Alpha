<?php
function connect(){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "alpha-gym";
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
        die("Error" . mysqli_connect_error());
    }
    return $conn;
}

function closeConnection($conn){
    mysqli_close($conn);
}
?>