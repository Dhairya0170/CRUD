<?php 

include("connection.php");


if(isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    
    $query = "SELECT * FROM form WHERE id = '$id'";
    
    
    $data = mysqli_query($conn, $query);
    
    
    if(mysqli_num_rows($data) > 0) {
        
        $result = mysqli_fetch_assoc($data);
        
        
        if(isset($_POST['register'])) {
            
            $fname = $_POST['first_name'];
            $lname = $_POST['lname'];
            $rnum = $_POST['rnumber'];
            $marks = $_POST['marks'];

            
            $update_query = "UPDATE form SET fname = '$fname', lname = '$lname', rnumber = '$rnum', marks = '$marks' WHERE id = '$id'";
            
            
            $update_result = mysqli_query($conn, $update_query);

            
            if ($update_result) {
                
                header("Location: display.php");
                exit(); 
            } else {
                echo "Update failed";
            }
        }
    } else {
        echo "No record found for the provided ID";
    }
} else {
    echo "ID not provided in the URL";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Update Details</h2>
    <div class="form">
      <form action="#" method="post">
        <div class="form-group">
          <label>First Name</label>
          <input type="text" name="first_name" value="<?php echo $result['fname']; ?>" required>
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" name="lname" value="<?php echo $result['lname']; ?>" required>
        </div> 
        <div class="form-group">
          <label>Roll Number</label>
          <input type="text" name="rnumber" value="<?php echo $result['rnumber']; ?>" required>
        </div>
        <div class="form-group">
          <label>Marks out of 100</label>
          <input type="text" name="marks" value="<?php echo $result['marks']; ?>">
        </div>
        <input type="submit" value="Update" name="register">
      </form>
    </div>
  </div>
</body>
</html>

