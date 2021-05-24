<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "LSProject";

$conn = mysqli_connect($server, $user, $password) or die(mysqli_error());

$sql_create = "CREATE DATABASE IF NOT EXISTS `$database`";
$result = mysqli_query($conn, $sql_create);
if(!$result) {
   echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn, $database);

$sql_create = "CREATE TABLE IF NOT EXISTS users(
                  ID int NOT NULL AUTO_INCREMENT,
                  PRIMARY KEY(ID),
                  username varchar(30) UNIQUE,
                  password varchar(20),
				  role varchar(20)
    		 )";

$retval = mysqli_query($conn, $sql_create);
if(!$retval) {
  die('Could not create table users : ' . mysqli_error());
}

$sql_create = "CREATE TABLE IF NOT EXISTS markers(
                  ID int NOT NULL AUTO_INCREMENT,
                  PRIMARY KEY(ID),
                  name varchar(20),
                  latitude double,
            	  longitude double,
	              color varchar(10),
	              dimensions varchar(20)
			)";
				 
$retval = mysqli_query($conn, $sql_create);
if(!$retval) {
  die('Could not create table markers : ' . mysqli_error());
}

?>

<html>
 <body>
  <form action="registration.php" id="form" name="form"></form>
  <script type="text/javascript">
   document.forms["form"].submit();
  </script>
 </body>
</html>