<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
include("config.php");
																			/* Sign Up*/
// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = "";
$username = $email = $password = "";
$sql;
$result;
global $num_of_rows;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if username only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed"; 
    }
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn,$sql);
	/*$num_of_rows = mysqli_num_rows($result);
	if(num_of_rows == 1)
		$usernameErr = "This username is already used";*/
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
 if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Sign Up</h2>
<p><span class="error">* required field.</span></p>
<form id="form" action="chosenDepartment.php" method="post" onsubmit="return validateForm()">
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  User name: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" username="submit" value="Submit">  
</form>




<?php
																			/* Login*/
// define variables and set to empty values
$usernameErr2 = $passwordErr2 = "";
$username2 = $password2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr2 = "username is required";
  } else {
    $username2 = test_input($_POST["username"]);
    // check if username only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username2)) {
      $usernameErr2 = "Only letters and white space allowed"; 
    }
  }
    
 if (empty($_POST["password"])) {
    $passwordErr2 = "Password is required";
  } else {
    $password2 = test_input($_POST["password"]);
  }

}

?>

<h2>Login</h2>
<p><span class="error">* required field.</span></p>
<form id="form" action="welcome.php" method="post" onsubmit="return validateForm()">
  User name: <input type="text" name="username2" value="<?php echo $username2;?>">
  <span class="error">* <?php echo $usernameErr2;?></span>
  <br><br>
  Password: <input type="password" name="password2" value="<?php echo $password2;?>">
  <span class="error">* <?php echo $passwordErr2;?></span>
  <br><br>
  <input type="submit" username="submit" value="Submit">  
</form>

</body>
</html>