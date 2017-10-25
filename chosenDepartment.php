<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Assignment1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$table = "SELECT * FROM Department";
$result = $conn->query($table);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Dep ID : " .$row["dept_id"]. " Dep name : " . $row["dept_name"]. "<br>";
    }
} else {
    echo "0 results";
}
?>