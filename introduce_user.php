<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "LSProject";

$conn=mysqli_connect($server, $user, $password) or die(mysqli_error());
mysqli_select_db($conn, $database);

$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$sql_insert="INSERT INTO users (username, password, role) VALUES ('".$username."', '".$password."', '".$role."')";

$retval = mysqli_query($conn, $sql_insert);
if(!$retval) {
  die('Could not insert user: ' . mysqli_error());
}

?>

<html>
 <body>
  <form action="registration.php" id="success" name="success"></form>
  <script type="text/javascript">
   document.forms["success"].submit();
  </script>
 </body>
</html>