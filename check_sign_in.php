<?php

$username = $_POST["user"];
$password = $_POST["pass"];

$server = "localhost";
$user = "root";
$pass = "";
$db = "LSProject";

$connection = new mysqli($server, $user, $pass, $db);
 
$sql = "SELECT * FROM users WHERE `username` = '$username'";
$result = mysqli_query($connection, $sql);
$validUsername = (mysqli_num_rows($result) == 1) ? 1 : 0;

if($validUsername) {
   $row = mysqli_fetch_assoc($result);
   $db_password = $row["password"];
   $role = $row["role"];
   $validPassword = ($db_password == $password) ? 1 : 0;
}
else {
   $validPassword = 1;
}

if($validUsername && $validPassword) {
   setcookie("username", $username, time() + 60*60*24, "/");
   setcookie("role", $role, time() + 60*60*24, "/");
}

?>

<html>
 <body>
  <form action="registration.php" id="reg" method="post">
     <input type="hidden" name="user" value="<?php echo $username;?>">
     <input type="hidden" name="validUsername" value="<?php echo $validUsername;?>">
	 <input type="hidden" name="validPassword" value="<?php echo $validPassword;?>">
  </form>
  <form action="locatii.php" id="success" name="login"></form>
  <script type="text/javascript">
   var validUsername = <?php Print($validUsername);?>;
   var validPassword = <?php Print($validPassword);?>;
   if((!validUsername) || (!validPassword)) {
      document.forms["reg"].submit();
   }
   else {
      document.forms["success"].submit();
   }
  </script>
 </body>
</html>
