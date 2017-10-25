<script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">

        function validateForm() {
        	var pausecontent = new Array();
    		<?php 
    			foreach($deps as $dep=>$dep_value) { 
    		?>
        			pausecontent.push('<?php echo $dep_value; ?>');
    		<?php 
    			} 
    		?>
    		alert(pausecontent[0]);
        }

  		</script>



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
<form id="form" method="post" onsubmit="return validateForm()">
<?php 
foreach($deps as $dep=>$dep_value) {
    ?>
   <input type="radio" ID = "dept" name="<?= $dep; ?>"><?php echo $dep_value?><br>

<?php }?>
<input name= "submit" type="submit" value="Submit">
</form>

