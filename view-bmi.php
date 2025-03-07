<!-- Navigation bar-->
<?php
include 'header.php';
require 'db.php';
?>
<link rel="stylesheet" href="view-bmi.css" />

<section>
    <header class='w-100 mt-4'>
        <h1 class='text-center'>BMI Calculation List</h1>
    </header>
    <div class="table-container">
        <?php
        $conn = connect();
        $userId = $_SESSION['userId'];
        $sql = "SELECT * FROM bmiinfo WHERE userId = '$userId'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) { 
            ?>

            <table>
                <tr>
                    <th>Sr.No</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Date Time</th>
                </tr>
                <?php
                $row_number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row_number . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["height"] . "</td>";
                    echo "<td>" . $row["weight"] . "</td>";
                    echo "<td>" . $row["date-time"] . "</td>";
                    echo "</tr>";
                    $row_number++;
                }
                closeConnection($conn);
                ?>
            </table>
            <?php
        } else {
            ?>
            <div class='error'>No record found</div>
            <?php
        }
        ?>
    </div>
</section>

<?php include 'footer.php'; ?>