
<script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript">

        function validateForm() {
        	var radios = document.querySelectorAll('input[ID="dept"]');
            var chosendDep;
            alert(radios.length);
            for(var i = 0; i < radios.length; i++) {
                if(radios[i].checked) {
                    chosendDep = i + 1
                    $.ajax({
                        type: "POST",
                        url: 'RegisterDepartment.php',
                        dataType: 'json',
                        data : {chosendDep},
                        success: function(data) {
                            alert(data.res);
                        }
                    });
                                alert("You have chosen departmen number :");

                }
            }
        } 
    
  		</script>



<?php
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
$username=$_SESSION['username'];
$password=$_SESSION['password'];

echo " Hello " . $username;

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


<form id="form" action="courses.php" method="post" onsubmit="return validateForm()">
<?php 
foreach($deps as $dep=>$dep_value) {
    

   echo '<input type="radio" ID = "dept" value="' . htmlspecialchars($dep_value) . '" />"' . htmlspecialchars($dep_value) . '"'."\n";

}?>
<input name= "submit" type="submit" value="Submit">
</form>

