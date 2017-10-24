<?php
include("config.php");

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];

echo 'Hello '.$username;

$result = mysqli_query($conn,"SHOW dept_name FROM Department") or die(mysqli_error($conn));
if (!$result) {
    echo 'Could not run query: ';
    exit;
}
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
}
