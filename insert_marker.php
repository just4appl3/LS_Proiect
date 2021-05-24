<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "LSProject";

$conn=mysqli_connect($server, $user, $password) or die(mysqli_error());
mysqli_select_db($conn, $database);

$name = $_POST["name"];
$latitude = floatval($_POST["latitude"]);
$longitude = floatval($_POST["longitude"]);
$dimensions = (int)$_POST["dimensions"];
$color = $_POST["color"];

$sql_insert="INSERT INTO markers (name, latitude, longitude, dimensions, color) VALUES ('".$name."', '".$latitude."', '".$longitude."', '".$dimensions."', '".$color."')";

$retval = mysqli_query($conn, $sql_insert);
if(!$retval) {
  die('Could not insert data: ' . mysqli_error());
}

?>

<html>
 <body>
  <form action="locatii.php" id="form" name="form"></form>
  <script type="text/javascript">
   document.forms["form"].submit();
  </script>
 </body>
</html>