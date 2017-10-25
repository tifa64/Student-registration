<?php
// Start the session
session_start();
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
$username=$_POST['username'];
$password=$_POST['password'];

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$table = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";

$result = $conn->query($table);
$deps;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	if(is_null($row["dept_name"])) {
    		header("Location:chosenDepartment.php");
  			exit();
  		}
  		else {
  			header("Location:chosenCourse.php");
  			exit();
  		}
	}
}

?>