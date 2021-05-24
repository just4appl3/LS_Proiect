<?php

if(isset($_COOKIE["username"]) && isset($_COOKIE["role"])) {
   $username = $_COOKIE["username"];
   $role = $_COOKIE["role"];

   $server = "localhost";
   $user = "root";
   $pass = "";
   $db = "LSProject";

   $connection = new mysqli($server, $user, $pass, $db); 
   $sql = "SELECT `username` FROM users WHERE `username` = '$username'";
   $result = mysqli_query($connection, $sql);
   $validLogin = (mysqli_num_rows($result) == 1) ? 1 : 0;
}
else {
   $validLogin = 0;
}

?>

<script>
function checkCredentials() {
   var validCredentials = <?php Print($validLogin);?>;
   var role = "<?php Print($role);?>";
   if(!validCredentials) {
	  alert("INVALID CREDENTIALS !\r\nTry to login again !");
	  window.open("registration.php", "_self");
   }
   else if(role.localeCompare("admin")) {
	  alert("You do not have ADMINISTRATOR rights to access this page !");
	  window.open("locatii.php", "_self");
   }
}
window.onload = checkCredentials;
</script>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add marker</title>
		<link rel="stylesheet" href="add_marker.css">
		<script src="add_marker.js"></script>
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
        <li><a href="locatii.php">Locații</a></li>
		<li><a class="active" href="add_marker.php">Adaugă locații</a></li>
		<li><a href="harta.php">Hartă</a></li>
		<li onclick="Logout()"><a href="#">Logout</a></li>
      </ul>
    </nav>
    <section></section>

      <form id="marker" action="insert_marker.php" method="post">
        
        <h1>Create a new marker</h1>
        
        <fieldset>
          
          <label for="name" style="font-weight:bold;">Name:</label>
          <input type="text" id="name" name="name" style="margin-bottom:0px;">
		  <p id="nameMessage" style="color:DarkGray; font-weight:bold; margin-bottom:6%;">
		     Marker name must have between 3 and 20 characters
		  </p>
          
          <label for="latitude" style="font-weight:bold;">Latitude:</label>
          <input type="text" id="latitude" name="latitude" style="margin-bottom:0px;">
		  <p id="latitudeMessage" style="color:DarkGray; font-weight:bold; margin-bottom:6%;">
		     Latitude must be a double between -250 and 250
		  </p>
          
          <label for="longitude" style="font-weight:bold;">Longitude:</label>
          <input type="text" id="longitude" name="longitude">
		  <p id="longitudeMessage" style="color:DarkGray; font-weight:bold; margin-bottom:6%;">
		     Longitude must be a double between -250 and 250
		  </p>

          <label for="dimensions" style="font-weight:bold;">Marker size:</label>
          <select id="dimensions" name="dimensions">
		      <option value="" disabled selected>Select a size</option>
              <option value="1">1</option>
			  <option value="1">2</option>
			  <option value="1">3</option>
			  <option value="1">4</option>
			  <option value="1">5</option>
			  <option value="1">6</option>
			  <option value="1">7</option>
			  <option value="1">8</option>
			  <option value="1">9</option>
          </select>
		  <p id="dimensionsMessage" style="color:red; font-weight:bold;"></p>
		  
          <label for="color" style="font-weight:bold; margin-top:8%;">Marker color:</label>
          <select id="color" name="color" required>
		      <option value="" disabled selected>Select a color</option>
              <option value="blue" style="color:blue;">blue</option>
              <option value="green" style="color:green;">green</option>
              <option value="yellow" style="color:yellow;">yellow</option>
              <option value="purple" style="color:purple;">purple</option>
			  <option value="red" style="color:red;">red</option>
			  <option value="red" style="color:orange;">orange</option>
              <option value="pink" style="color:pink;">pink</option>
          </select>
		  <p id="colorMessage" style="color:red; font-weight:bold;"></p>
          
        <button onclick="submitMarkerForm();">Add Marker</button>
        
      </form>
      
    </body>
</html>
