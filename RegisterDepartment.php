<?php

  session_start();
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
  $chosendDep=$_POST['chosendDep'];
  $username=$_SESSION['username'];
  $password=$_SESSION['password'];

  $sql = "UPDATE User SET dept_id = '$chosendDep' WHERE username = '$username' AND password = '$password'";
  $conn->query($sql);

  echo json_encode($chosendDep);



  ?>