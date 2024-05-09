<?php 
// Include the connection script
include("connection.php");

// Check if the form is submitted
if(isset($_POST['register'])) {
    // Retrieve form data
    $fname = $_POST['first_name'];
    $lname = $_POST['lname'];
    $rnum = $_POST['rnumber'];
    $marks = $_POST['marks'];

    // Check if all form fields are filled
    if ($fname != "" && $lname != "" && $rnum != "" && $marks != "") {
        // Prepare the SQL query with proper column names
        $query = "INSERT INTO form (fname, lname, rnumber, marks) VALUES ('$fname', '$lname', '$rnum', '$marks')";

        // Execute the query
        $data = mysqli_query($conn, $query);

        // Check if data is inserted successfully
        if ($data) {
            echo "Data registered successfully";
        } else {
            echo "Registration failed";
        }
    } else {
        echo "Please fill out all the fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Registration Form</h2>
    <div class="form">
      <form action="#" method="post">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="first_name" required>
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lname" required>
        </div> 
        <div class="form-group">
          <label>Roll Number</label>
          <input type="text" name="rnumber" required>
        </div>
        <div class="form-group">
          <label>Marks out of 100</label>
          <input type="text" name="marks">
        </div>
        <input type="submit" value="Register" name="register">
      </form>
    </div>
  </div>
</body>
</html>
