<!-- Navigation bar-->
<?php
include 'header.php';
require 'db.php';
?>

<section>
    <header class='w-100 mt-4'>
        <h1 class='text-center'>User List</h1>
    </header>
    <div class="table-container">
        <?php
        $conn = connect();
        $userId = $_SESSION['userId'];
        $sql = "SELECT * FROM users WHERE id != '$userId'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            ?>

            <table>
                <tr>
                    <th>Sr. No.</th>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Created On</th>
                    <th>Actions</th>
                </tr>
                <?php
                $row_number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row_number . "</td>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["role"] . "</td>";
                    echo "<td>" . $row["dt"] . "</td>";
                    $userName = $row["username"];
                    $onDelete = "deleteUser('".$userName."')";
                    echo "<td>
                            <button>Edit</button>
                            <button class='error' onclick=".$onDelete.">Delete</button>
                        </td>";
                    echo "</tr>";

                    // onclick="deleteUser('Vinod')"

                    $row_number++;
                }
                ?>
            </table>
            <?php
        } else {
            ?>
            <div class='error'>No record found</div>
            <?php
        }
        closeConnection($conn);
        ?>
    </div>
</section>

<style>
    .table-container {
        margin: 5%
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .error {
        text-align: center;
        color: red;
        margin-left: 6%;
    }

    .mt-4 {
        margin-top: 4%;
    }
</style>
<script>
    function deleteUser(userName) {
        const response = confirm("Are you sure you want to delete " + userName + " ?");
        if (response) {
            fetch('delete-user-api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'userName=' + encodeURIComponent(userName),
            }).then(response => response.text())
            .then(data => {
                // Handle the response from the server
                alert(data);
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        return;
    }
</script>
<?php include 'footer.php'; ?>