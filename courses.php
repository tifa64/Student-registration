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
  $chosendDep=$_SESSION['chosendDep'];
  $username=$_SESSION['username'];

  echo " Hello " . $username;

  $table = "SELECT course_name FROM Course WHERE dept_id = '$chosendDep'";
  $result = $conn->query($table);
  $courses;
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      $courses[] = $row["course_name"];
  }
  } 
  else {
    echo "0 results";
  }
  ?>

  <form id="form">
<?php 
foreach($courses as $course=>$course_value) {
    

   echo '<input type="radio" ID = "dept" value="' . htmlspecialchars($course_value) . '" />"' . htmlspecialchars($course_value) . '"'."\n";

}?>