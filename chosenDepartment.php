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
$deps;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$deps[] = $row["dept_name"];
	}
} else {
    echo "0 results";
}
?>

<html>
<br>
<form method="post" action="welcome.php">
<?php 
foreach($deps as $dep=>$dep_value) {
    ?>
   <input type="radio" name="<?= $option; ?>"><?php echo $dep_value?><br>

<?php }?>
<input name= "submit" type="submit" value="Submit">