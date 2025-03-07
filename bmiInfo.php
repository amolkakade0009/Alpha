<?php
require'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "Hello amol 2";


  // $server = "localhost";
  // $username = "root";
  // $password = "";
  // $database = "users";
  // $conn = mysqli_connect($server, $username, $password, $database);
  // if (!$conn) {
  //   die("Error: Unable to connect to MySQL. " . mysqli_connect_error());
  // } else {
  //   echo "Connected successfully";
  // }

  
  $conn = connect();

  
  $uName = $_POST["uName"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $height = $_POST["height"];
  $weight = $_POST["weight"];


  $sql = "INSERT INTO `bmiInfo` (`uName`, `age`, `gender`, `height`, `weight`) VALUES ('$uName', '$age', '$gender', '$height', '$weight')";
  $result = mysqli_query($conn, $sql);
}

?>

<!-- 
<div class="MainPage">
  <div class="row1">
    <h2>BMI: <span id="BMI"></span></h2>
    <h2>Body Fat:<span id="BodyFat"></span></h2>
    <h2>Lean Body Mass: <span id="LBM"></span></h2>
  </div>

  <div class="row2">
    <h2>Body Water: <span id="BodyWater"></span></h2>
    <h2>BMR: <span id="BMR"></span></h2>
    <h2>MuscleRate: X-Ray Required <span id="MuscleRate"></span></h2>
  </div>

  <div class="row3">
    <h2>MuscleMass: <span id="MuscleMass"></span></h2>
    <h2>BoneMass: <span id="BoneMass"></span></h2>
  </div>
</div>

<div class="FinalBorder"></div>

<div class="dots">
  <div class="green">
    <span class="dot"></span>
    <p>&nbsp; Normal</p>
  </div>

  <div class="yellow">
    <span class="dot"></span>
    <p>&nbsp; Moderate</p>
  </div>

  <div class="red">
    <span class="dot"></span>
    <p>&nbsp; Bad</p>
  </div>
</div>
<div class="viewDietPlane">
  <button onclick="openHtmlpage()" id="diet-button"> View Diet</button>
</div>
<div class="lastBorder"></div> -->