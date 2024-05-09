<?php
include("connection.php");

$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <div class="container">
        <h2>Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Roll Number</th>
                    <th>Marks</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>" . $result['id'] . "</td>";
                    echo "<td>" . $result['fname'] . "</td>";
                    echo "<td>" . $result['lname'] . "</td>";
                    echo "<td>" . $result['rnumber'] . "</td>";
                    echo "<td>" . $result['marks'] . "</td>";
                    echo "<td> <a href='update_design.php?id=" . $result['id'] .
                     "&fn=" . $result['fname'] . "&ln=" . $result['lname'] . 
                     "&rn=" . $result['rnumber'] . "&m=" . $result['marks'] . 
                     "'>Update</a> | <a href='delete.php?id=" . $result['id'] . "' onclick = 'return checkdelete()'>Delete</a> </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script>
    function checkdelete()
    {
        return confirm('are you sure you want to delete this record')
    }
</script>