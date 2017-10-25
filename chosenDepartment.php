<?php
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

echo 'Username :  '.$username. ', email: '.$email. ', password: '.$password.'<br>';

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
$email=$_POST['email'];

$sql = "INSERT into User(username, password, email) values ('$username','$password','$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$table = "SELECT * FROM User";
$result = $conn->query($table);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  "Username : " .$row["username"]. " Passowrd : " . $row["password"]. " Email : " . $row["email"]. " Registration date : " .$row["registration_date"]. " User id : " . $row["user_id"]. " Dept Id : " . $row["dept_id"]."<br>";
    }
} else {
    echo "0 results";
}
?>