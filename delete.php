<?php
 include("connection.php");
 
 $id =$_GET['id'];

 $query= "DELETE FROM form WHERE id = '$id'";
 
 $data = mysqli_query($conn, $query);

 if ($data)
 {
    header("Location: display.php");
    echo "Data deleted";
 }

 else 
 {
    echo "Failed";
 }
?>