<?php
  $response = array();
  $response['status'] = 'no';
  $response['message'] = 'This was successful';

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
  $password=$_POST['password'];
  
  $response['message'] = md5($password);
  echo json_encode($response);

?>