<?php
$servername = "localhost";
$username ="root";
$password="";
$db_name="crud";

$conn = mysqli_connect($servername,$username,$password,$db_name);

if($conn)
    {
        echo "connection ok";
    }
else
    {
        echo "connection failed";
    }
?>