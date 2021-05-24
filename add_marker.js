function submitMarkerForm() {
   document.getElementById("marker").addEventListener("click", 
      function(event) {
         event.preventDefault()
      }
   );
   
   var name = document.getElementById("name").value;
   var latitude = document.getElementById("latitude").value;
   var latitude = document.getElementById("latitude").value;
   var longitude = document.getElementById("longitude").value;
   var dimensions = document.getElementById("dimensions").value;
   var color = document.getElementById("color").value;
   var validMarker = true;
   
   if(name.length < 3) {
      document.getElementById("nameMessage").innerHTML = "Current name is under 3 characters long !";
	  document.getElementById("nameMessage").style.color = "red";
	  validMarker = false;
	}
	
   else if(name.length > 20) {
      document.getElementById("nameMessage").innerHTML = "Current name is over 20 characters long !";
	  document.getElementById("nameMessage").style.color = "red";
	  validMarker = false;
	}
   else {
      document.getElementById("nameMessage").innerHTML = "";
	}
	
   if(!latitude) {
      document.getElementById("latitudeMessage").innerHTML = "Field cannot be empty !";
	  document.getElementById("latitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(!isDouble(latitude)) {
      document.getElementById("latitudeMessage").innerHTML = "Not a double value. Maybe try . instead of , ?";
	  document.getElementById("latitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(parseFloat(latitude) > 250) {
      document.getElementById("latitudeMessage").innerHTML = "Value larger than 250 !";
	  document.getElementById("latitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(parseFloat(latitude) < -250) {
      document.getElementById("latitudeMessage").innerHTML = "Value lower than -250 !";
	  document.getElementById("latitudeMessage").style.color = "red";
	  validMarker = false;
   }
   else {
      document.getElementById("latitudeMessage").innerHTML = "";
   }
   
   if(!longitude) {
      document.getElementById("longitudeMessage").innerHTML = "Field cannot be empty !";
	  document.getElementById("longitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(!isDouble(longitude)) {
      document.getElementById("longitudeMessage").innerHTML = "Not a double value. Maybe try . instead of , ?";
	  document.getElementById("longitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(parseFloat(longitude) > 250) {
      document.getElementById("longitudeMessage").innerHTML = "Value larger than 250 !";
	  document.getElementById("longitudeMessage").style.color = "red";
	  validMarker = false;
   }
   
   else if(parseFloat(longitude) < -250) {
      document.getElementById("longitudeMessage").innerHTML = "Value lower than -250 !";
	  document.getElementById("longitudeMessage").style.color = "red";
	  validMarker = false;
   }
   else {
      document.getElementById("longitudeMessage").innerHTML = "";
   }
   
   if(!dimensions) {
      document.getElementById("dimensionsMessage").innerHTML = "Field is required !";
	  validMarker = false;	   
   }
   else {
      document.getElementById("dimensionsMessage").innerHTML = "";
   }
   
   if(!color) {
      document.getElementById("colorMessage").innerHTML = "Field is required !";
	  validMarker = false;	   
   }
   else {
      document.getElementById("colorMessage").innerHTML = "";
   }
   
   if(validMarker) {
   document.forms["marker"].submit();
   }
}

function isDouble(value) {
	asciiCode = value[0].charCodeAt(0);
	if(((asciiCode < 48) || (asciiCode > 57)) && (asciiCode != 45))
	   return false;
	   
	for(it = 1; it < value.length-1; it++) {
	   asciiCode = value[it].charCodeAt(0);
	   if(((asciiCode < 48) || (asciiCode > 57)) && (asciiCode != 46))
	      return false;
	}
	
	asciiCode = value[value.length-1].charCodeAt(0);
	if((asciiCode < 48) || (asciiCode > 57))
	   return false;
	   
   return true;
}

function Logout() {
   document.cookie = "username" +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   document.cookie = "role" +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   window.open("registration.php", "_self");
}