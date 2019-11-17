   function formValidation()  
{  
  
var uname = document.registration.username;  
var upass = document.registration.password;  
var upass2 = document.registration.password2;  
var uemail = document.registration.email;  
var utype = document.registration.usertype;
 
{ 
if(allLetter(uname))  
{   
if(passid_validation(upass,6,12))  
{  
if(passid_validationx(upass2,6,12))  
{ 
if(ValidateEmail(uemail))  
{ 
if(usertypeselect(utype))  
{ 

}    
}   
}  
}
}
  
}  
return false;  
}  

//------------------------------------------------------------------------------------------ 

//------------------------------------------------------------------------------------------ 
 function passid_validation(upass,mx,my)  
{  
var passid_len = upass.value.length;  
if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
{  
alert("Password should not be empty / length be between "+mx+" to "+my);  
upass.focus();  
return false;  
}  
return true;  
}  

//------------------------------------------------------------------------------------------ 
 function passid_validationx(upass2,mx,my)  
{  
var passid_len = upass2.value.length;  
if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
{  
alert("Retype Password should not be empty / length be between "+mx+" to "+my);  
upass2.focus();  
return false;  
}  
return true;  
}  

//------------------------------------------------------------------------------------------ 
 function allLetter(uname)  
{   
var letters = /^[A-Za-z]+$/;  
if(uname.value.match(letters))  
{  
return true;  
}  
else  
{  
alert('Username must have alphabet characters only');  
uname.focus();  
return false;  
}  
}  

//------------------------------------------------------------------------------------------ 
function ValidateEmail(uemail)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(uemail.value.match(mailformat))  
{  
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
uemail.focus();  
return false;  
}  
}  
 
//------------------------------------------------------------------------------------------ 
 function usertypeselect(utype)  
{  
if(utype.value == "Default")  
{  
alert('Select user type from the list');  
utype.focus();  
return false;  
}  
else  
{  
alert('Form Succesfully Submitted');  
window.location.reload();
return true;  
}  
}  
 
//------------------------------------------------------------------------------------------ 
 