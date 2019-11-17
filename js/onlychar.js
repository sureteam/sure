function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
        return false;
        return true;
	}
		   
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }

function f(){

var el=document.getElementById('bang');
var re=/^[A-z]+$/; 
if(!re.test(el.value) ) { alert("please enter char only");  }

}

        function allLetter(inputtxt)  
          {   
          var letters = /^[A-Za-z]+$/;  
          if(inputtxt.value.match(letters))  
          {  
          alert('Your name have accepted : you can try another');  
          return true;  
          }  
          else  
          {  
          alert('Please input alphabet characters only');  
          return false;  
          }  
          }  
		  
		  
 function checkNum()
{
 
if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event.keyCode == 8)
   return true;
else
   {
       alert("Please enter only char");
       return false;
   }
 
}