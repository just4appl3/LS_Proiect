<?php

$server   = "localhost";
$user     = "root";
$password = "";
$database = "LSProject";

$conn = mysqli_connect($server, $user, $password) or die(mysqli_error());
mysqli_select_db($conn, $database);

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$Registrationerror = isset($_POST["Registrationerror"]) ? $_POST["Registrationerror"] : false;

$usernameMessage = $Registrationerror ? "Username already exists !" : "Username must have at least 4 characters.";
$passwordMessage = "Password must be between 6 and 20 characters.";
$verifyMessage = "Passwords must match !";
$color = $Registrationerror ? "red" : "";

$user = isset($_POST["user"]) ? $_POST["user"] : "";
$validUsername = isset($_POST["validUsername"]) ? $_POST["validUsername"] : 1;
$validPassword = isset($_POST["validPassword"]) ? $_POST["validPassword"] : 1;
$invalidUserMessage = $validUsername ? "" : "User does not exist !";
$invalidPassMessage = $validPassword ? "" : "Password is incorect !";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title> 
  <link rel="stylesheet" href="registration.css">
  <script src="registration.js"></script> 
</head>
<body>

<div class="login-wrap">
	<div class="login-html">
	
	   <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
	   <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
	   
	   <div class="login-form">
	      <div class="sign-in-htm">
		  <form id="login" action="check_sign_in.php" method="post">
		
		  <div class="group">
		     <label for="user" class="label">Username</label>
			 <input id="user" name="user" type="text" class="input" value="<?php echo $user;?>">
		  </div>
		  <p id="invalidUserMessage" style="color:red;"><?php echo $invalidUserMessage;?></p>
			   
		  <div class="group">
		     <label for="pass" class="label">Password</label>
			 <input id="pass" name="pass" type="password" class="input" data-type="password">
		  </div>
		  <p id="invalidPassMessage" style="color:red;"><?php echo $invalidPassMessage;?></p>
				
		  <div class="group">
		     <input id="check" type="checkbox" class="check" checked>
			 <label for="check"><span class="icon"></span> Keep me Signed in</label>
		  </div>
				
		 <div class="group">
		    <input type="submit" id="registerSubmit" class="button hand" value="Sign In" onclick="submitLoginForm();">
	     </div>
		 </form>
				
	     <div class="hr"></div>
		    <div class="foot-lnk">
			</div>
	     </div>
			<form id="register" action="check_sign_up.php" method="post">
		    <div class="sign-up-htm">
			
		    <div class="group">
			   <label for="username" class="label">Username</label>
			   <input id="username" name="username" type="text" class="input" value="<?php echo $username;?>">
			</div>
			<p id="usernameMessage" style="color:<?php echo $color; ?>"><?php echo $usernameMessage;?></p>
			
			<div class="group">
   			   <label for="password" class="label">Password</label>
			   <input id="password" name="password" type="password" class="input" data-type="password">
			</div>
			<p id="passwordMessage"><?php echo $passwordMessage;?></p>
			
			<div class="group">
     		   <label for="verify" class="label">Repeat Password</label>
			   <input id="verify" name="verify" type="password" class="input" data-type="password">
			</div>
			<p id="verifyMessage"><?php echo $verifyMessage;?></p>
            
			<div class="group">			   
               <table style="width:100%">
                  <tr>
                  <th> <input type="checkbox" class="hand" onclick="switchRole();"> </th> 
                  <th> <h1 id="displayRole">user</h1> </th>
                  </tr>
               </table>
            </div>
			
			<input type="hidden" id="role" name="role" value="user">
		
			<div class="group">
			   <input type="submit" id="registerSubmit" class="button hand" value="Sign Up" onclick="submitRegisterForm();">
			</div>
			</form>
			
			<div class="hr"></div>
			   <div class="foot-lnk">
			   </div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
