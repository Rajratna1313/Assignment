


<?php
$host = "localhost";
$user = "root";  
$pass = "root@123";      
$dbname = "crud_db"; 

$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
