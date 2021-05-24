function changeColor() {
   if(!document.getElementById("usernameMessage").style.color.localeCompare("red")) {
      document.getElementById("tab-2").checked = true;
   }
}
window.onload = changeColor;

function switchRole() {
   var role = document.getElementById("displayRole").innerHTML;
   role = !role.localeCompare("user") ? "admin" : "user";
   document.getElementById("displayRole").innerHTML = role;
   document.getElementById("role").value = role;
}

function submitLoginForm() {
   document.getElementById("login").addEventListener("click", 
      function(event) {
         event.preventDefault()
      }
   );
     
   var user = document.getElementById("user").value;
   var pass = document.getElementById("pass").value;
   var validLogin = true;
   
   if(user.length < 4 || !user) {
	   document.getElementById("invalidUserMessage").innerHTML = "Username must be at least 4 characters long !";
	   validLogin = false;
   }
   
   if(pass.length < 6 || !pass) {
      document.getElementById("invalidPassMessage").innerHTML = "Password must have at least 6 characters !";
	  validLogin = false;
   }
   
   if(validLogin) {
	  document.forms["login"].submit();
   }
}

function submitRegisterForm() {
   document.getElementById("register").addEventListener("click", 
      function(event) {
         event.preventDefault()
      }
   );
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var verify = document.getElementById("verify").value;
	var validRegister = true;
	
	if(username.length < 4) {
		document.getElementById("usernameMessage").innerHTML = "Current username is under 4 characters long !";
		document.getElementById("usernameMessage").style.color = "red";
		validRegister = false;
	}	
	else {
	   document.getElementById("usernameMessage").innerHTML = "";
	}
	
	if(password.length < 6) {
		document.getElementById("passwordMessage").innerHTML = "Current password is under 6 characters long !";
	    document.getElementById("passwordMessage").style.color = "red";
		validRegister = false;
	}
	
	else if(password.length > 20 ) {
		document.getElementById("passwordMessage").innerHTML = "Current password is over 20 characters long !";
	    document.getElementById("passwordMessage").style.color = "red";
		validRegister = false;
	}	
	else {
	   document.getElementById("passwordMessage").innerHTML = "";
	}
	
	if(password.localeCompare(verify) || !verify) {
		document.getElementById("verifyMessage").innerHTML = "Passwords do not match !";
	    document.getElementById("verifyMessage").style.color = "red";
		validRegister = false;
	}	
	else {
	   document.getElementById("verifyMessage").innerHTML = "";
	}
	
	if(validRegister) {
	   document.forms["register"].submit();
	}
}