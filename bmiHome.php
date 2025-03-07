<!-- Navigation bar-->
<?php include 'header.php';
require'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // echo "Hello amol 2";


  // $server = "localhost";
  // $username = "root";
  // $password = "";
  // $database = "";
  // $conn = mysqli_connect($server, $username, $password, $database);
  // if (!$conn) {
  //   die("Error: Unable to connect to MySQL. " . mysqli_connect_error());
  // } else {
  //   // echo "Connected successfully";
  // }
  $conn = connect();

  $userId = $_SESSION['userId'];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $height = $_POST["height"];
  $weight = $_POST["weight"];


  $sql = "INSERT INTO `bmiInfo` (`userId`, `age`, `gender`, `height`, `weight`) VALUES ('$userId', '$age', '$gender', '$height', '$weight')";
  $result = mysqli_query($conn, $sql);
  echo"<script> Calculate()</script>";
  closeConnection($conn);
}

?>

<link rel="stylesheet" href="bmiStyle.css" />
<div class="oldBmi-button">
  <button  onclick='location.href="view-bmi.php"'>View Old BMI Calculations</button>

</div>
<header class='bmi-header '>
  <h1>Alpha BMI Calculator </h1>
</header>
<div class="form-container">


  <form action="bmiHome.php" method="POST">
    <div class="input-info">
      <!-- <div class="zerothBox">
        <label for="NameInput">Name &nbsp;: </label>
        <input type="text" name="uName" placeholder="" />
      </div> -->

      <div class="firstBox">
        <div class="age">
          <label for="Input_Box">Age &nbsp;: </label>
          <input value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>" type="number" name="age" id="Input_Box" min="0" max="100" />
        </div>

        <div class="Radios">
        <label for="MaleRadio">Male</label>
        <input type="radio" id="MaleRadio" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'checked' : ''; ?> />

        <label for="FemaleRadio">&nbsp; Female</label>
        <input type="radio" name="gender" value="female" id="FemaleRadio" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'checked' : ''; ?> />
      </div>
      </div>

      <div class="secondBox">
        <div class="height">
          <label for="HeightInput">Height (cm) &nbsp;: </label>
          <input value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>" type="number" name="height" id="HeightInput" />
        </div>

        <div class="weight">
          <label for="WeightInput">Weight (kg) &nbsp;: </label>
          <input value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : ''; ?>" type="number" name="weight" id="WeightInput" />
        </div>
      </div>
    </div>


    <div class="MiddleBorder">
      <input id="Calculate-BTN" class="Calculate-BTN" type="submit"  value="Calculate">
      <!-- <button type="reset">Reset</button> -->
    </div>
    
    
  </form>
  
</div>



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

<div class="FinalBorder">
  <button onclick="openHtmlpage()" id="diet-button"> Your Category</button>
  <button class="printPage" onclick="printPage()">Print</button>

</div>

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
<!-- <div class="viewDietPlane">
  <button onclick="openHtmlpage()" id="diet-button"> View Diet</button>
  <button class="printPage" onclick="printPage()">Print</button>
</div> -->
<div class="lastBorder">
  <button onclick="openHtmlpage()" id="diet-button"> View diet plan</button>
</div>


<!-- footer section-->
<?php include 'footer.php'; ?>

<script>
  function printPage() {
    // Hide header and footer for printing
    var elementsToHide = document.querySelectorAll('.navbar, .Calculate-BTN, .printPage, .lastBorder, .footer, .dots');
    if (elementsToHide.length > 0) {
      elementsToHide.forEach(element => {
        element.style.display = 'none';
      });
    }

    // Print the page
    window.print();

    // Show header and footer again
    var elementsToShow = document.querySelectorAll('.navbar, .Calculate-BTN, .printPage, .lastBorder, .footer, .dots');
    if (elementsToShow.length > 0) {
      elementsToShow.forEach(element => {
        element.style.display = '';
      });
    }
  }

</script>
<script src="bmiIndex.js"></script>