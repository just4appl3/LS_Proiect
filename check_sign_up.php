<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "LSProject";

$conn = mysqli_connect($server, $user, $password) or die(mysqli_error());
mysqli_select_db($conn, $database);

$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];
 
$sql_read = "SELECT `username` FROM users WHERE `username` = '$username'";
$result = mysqli_query($conn, $sql_read);
$register = (mysqli_num_rows($result) < 1) ? 1 : 0;
 
?>

<html>
 <body>
  <form action="introduce_user.php" id="insert" name="insert" method="post">
    <input type="hidden" name="username" value="<?php echo $username;?>">
    <input type="hidden" name="password" value="<?php echo $password;?>">
    <input type="hidden" name="role" value="<?php echo $role;?>">
  </form>
  <form action="registration.php" id="register" name="register" method="post">
     <input type="hidden" name="username" value="<?php echo $username;?>">
	 <input type="hidden" name="Registrationerror" value="<?php echo !$register;?>">
  </form>
  <script type="text/javascript">
   var register = "<?php Print($register); ?>";
   if(register != 0) {
      document.forms["insert"].submit();
   }
   else {
      document.forms["register"].submit();
	}
  </script>
 </body>
</html> 