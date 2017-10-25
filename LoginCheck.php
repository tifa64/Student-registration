  <?php
  $username=$_POST['username'];
  $password=$_POST['password'];
  $response = array();
  $response['status'] = 'no';
  $response['message'] = 'This failed';

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
  $table = "SELECT username FROM User WHERE username = '$username'";
  $result = $conn->query($table);
  if ($result->num_rows > 0) {
      $table = "SELECT password FROM User WHERE password = '$password'";
      $result = $conn->query($table);
      if ($result->num_rows > 0) {
          $response['status'] = 'yes';
          $response['message'] = 'This succeeded';
      }
      

  }
  echo json_encode($response);
?>