<!DOCTYPE html>
<html>

<head>
    <style>
        #map {
            height: 750px;
            width: 100%;
        }
    </style>
	
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
        <li><a href="locatii.php">Locații</a></li>
		<li id="restricted"><a href="add_marker.php">Adaugă locații</a></li>
		<li><a class="active" href="harta.php">Hartă</a></li>
		<li onclick="Logout()"><a href="#">Logout</a></li>
      </ul>
    </nav>
    <section></section>

    <?php
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

	$query = '';
	$filename = 'coordonate.json';
	$data = file_get_contents($filename);
	$dataJ = json_decode ($data, true);
	
	foreach ($dataJ as $row)
	{
		$sql = "INSERT INTO markers (name, latitude, longitude, 
		color, dimensions) VALUES('".$row["Nume"]."', '".$row["Latitudine"]."',
		'".$row["Longitudine"]."', '".$row["Culoare"]."', '".$row["Dimensiune"]."')";
		mysqli_query($conn, $sql);
	}

	?>
	<img src="img/harta.png">
    <div id="map"></div>
    <script>
        function initMap() {
            var uluru = {
                lat: -25.363,
                lng: 131.044
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
             const iconBase =
          "https://developers.google.com/maps/documentation/javascript/examples/full/images/";
        const icons = {
          parking: {
            icon: iconBase + "parking_lot_maps.png",
          },
          library: {
            icon: iconBase + "library_maps.png",
          },
          info: {
            icon: iconBase + "info-i_maps.png",
          },
        };
		var iconBasee = 'http://maps.google.com/mapfiles/ms/icons/';
			<?php
			  $sql_read = "SELECT * FROM markers";
              $result = mysqli_query($conn, $sql_read);
              if(!$result) {
                die('Could not read data: ' . mysqli_error());
              }
			  
			  $index = 0;
			  while($row = mysqli_fetch_array($result)) {
				  echo "var marker$index = new google.maps.Marker(
				  {		
					  position:{	lat:" . $row['latitude'] . ", lng:" . $row['longitude'] . "},map: map,
							title: '".$row['name']."', icon: iconBasee + '".$row['color']."-dot.png'});";
							$index = $index + 1;
              }
			?>
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByKEo-eVV5YXXbbpGUsL7_Leuxb8c543U&callback=initMap">
    </script>
	
</body>

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