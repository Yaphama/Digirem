function ValidateEmail(){
	var regemail =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*/;
	var email = document.getElementById("uemail").value;
	var emailres = email.match(regemail);
	if(emailres){
	return true;  
	}else{
	alert("Enter a valid email address");
	window.location.replace("logReg.php");
	}
	}

function matchpass(){  
	var firstpassword=document.getElementById('pass1').value;  
	var secondpassword=document.getElementById('pass2').value;    
  
	if(firstpassword==secondpassword){  
	return true;  
	}  
	else{  
	alert("password must be same!");  
	return false;  
	}  
	} 

function validatepass(){
	var regpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
	var pass = document.getElementById("pass1").value;
	var passres =  pass.match(regpass);
	if(passres){ 
 	return true;
	}else{ 
	alert('The password must be between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character')
	window.location.replace("logReg.php");
	}
	}

function phonenumber(){
  var phoneno = /^\d{10}$/;
  var no = document.getElementById("uphone");
  var nores = no.match(phoneno);
  if(nores){
      return true;
  }else{
     alert("Not a valid Phone Number");
     window.location.replace("logReg.php");
  }
  }


	function ValidateAll(){
		ValidateEmail();
		matchpass();
		validatepass();
	} 