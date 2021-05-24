<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Proiect LS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Proiect LS</label>
      <ul>
        <li><a class="active" href="locatii.php">Locații</a></li>
		<li id="restricted"><a href="add_marker.php">Adaugă locații</a></li>
		<li><a href="harta.php">Hartă</a></li>
		<li onclick="Logout()"><a href="#">Logout</a></li>
      </ul>
    </nav>
    <section></section>
	<img src="img/locatii.png">
	</body>
	
<?php

$role = $_COOKIE["role"];
$server = "localhost";
$user = "root";
$pass = "";
$db = "LSProject";

$conn = new mysqli($server, $user, $pass, $db); 
if(isset($_COOKIE["username"]) && isset($_COOKIE["role"])) {
   $username = $_COOKIE["username"];
   $role = $_COOKIE["role"];
   $sql = "SELECT `username` FROM users WHERE `username` = '$username'";
   $result = mysqli_query($conn, $sql);
   $validLogin = (mysqli_num_rows($result) == 1) ? 1 : 0;
}
else {
   $validLogin = 0;
}

$sql_read = "SELECT * FROM markers";

$result = mysqli_query($conn, $sql_read);
if(! $result )
{
  die('Could not read data: ' . mysqli_error());
}

echo "<table style=\"border-collapse: collapse; border: 1px solid black; margin-left: auto; margin-right: auto;\">
<tr>
	<th style=\"border: 1px solid black;\">ID</th>
	<th style=\"border: 1px solid black;\">Nume</th>
	<th style=\"border: 1px solid black;\">Latitudine</th>
	<th style=\"border: 1px solid black;\">Longitudine</th>
	<th style=\"border: 1px solid black;\">Culoare</th>
	<th style=\"border: 1px solid black;\">Dimensiune</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['ID'] . "</td>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['name'] . "</td>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['latitude'] . "</td>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['longitude'] . "</td>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['color'] . "</td>";
	  echo "<td style=\"border: 1px solid black;\">" . $row['dimensions'] . "</td>";
	echo "</tr>";
  }

echo "</table>";
?>

<script>
function checkCredentials() {
   var validCredentials = <?php Print($validLogin);?>;
   if(!validCredentials) {
	  alert("INVALID CREDENTIALS !\r\nTry to login again !");
	  window.open("registration.php", "_self");
   }
}
window.onload = checkCredentials;

function Logout() {
   document.cookie = "username" +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   document.cookie = "role" +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   window.open("registration.php", "_self");
}
   
const value = `; ${document.cookie}`;
const parts = value.split(`; ${"role"}=`);
if (parts.length === 2) {
   var role = parts.pop().split(';').shift();
}
if(role.localeCompare("admin")) {
   document.getElementById("restricted").remove();
}
</script>
  

</html>
