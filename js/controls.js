// JavaScript Document


$(document).ready(function () {
  //called when key is pressed in textbox
  $("#quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#deposit").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errdepo").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#vat").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errvat").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#discount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errdisc").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#checkamt").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errchk").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#vat2").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errvat2").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


$(document).ready(function () {
  //called when key is pressed in textbox
  $("#mfone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmfone").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#hfone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errhfone").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


$(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobilefone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmf").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errcontact").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#cost").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errcost").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#rcost").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errrcost").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});



function AllowAlphabet(){
               if (!pdt.pname.value.match(/^[a-zA-Z ]+$/) && pdt.pname.value !="")
               {
                    pdt.pname.value="";
                    pdt.pname.focus(); 
                    alert("Please Enter only alphabets in text");
               }
}  

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#minlevel").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errminlevel").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#maxlevel").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmaxlevel").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

// customer
//------------------------------------------------------------------------
function AllowAlphabet(){
               if (!cust.cname.value.match(/^[a-zA-Z ]+$/) && cust.cname.value !="")
               {
                    cust.cname.value="";
                    cust.cname.focus(); 
                    alert("Please Enter only alphabets in text");
               }
} 

 
function AllowAlphabet(){
               if (!registration.username.value.match(/^[a-zA-Z ]+$/) && registration.username.value !="")
               {
                    registration.username.value="";
                    registration.username.focus(); 
                    alert("Please Enter only alphabets in text");
               }
} 

// department
//------------------------------------------------------------------------
 function AllowAlphabet(){
               if (!dpt.dname.value.match(/^[a-zA-Z ]+$/) && dpt.dname.value !="")
               {
                    dpt.dname.value="";
                    dpt.dname.focus(); 
                    alert("Please Enter only alphabets in text");
               }
} 

// branch
//------------------------------------------------------------------------
 $(document).ready(function () {
  //called when key is pressed in textbox
  $("#contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errcontact").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

function AllowAlphabet(){
               if (!branches.name.value.match(/^[a-zA-Z ]+$/) && branches.name.value !="")
               {
                    branches.name.value="";
                    branches.name.focus(); 
                    alert("Please Enter only alphabets in text");
               }
}  