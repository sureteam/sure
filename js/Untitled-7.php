<script type="text/javascript">
<!-- Begin
/* This script and many more are available free online at
The JavaScript Source!! http://javascript.internet.com
Created by: Husay :: http://www.communitxt.net */

var arrInput = new Array(0);
  var arrInputValue = new Array(0);

function addInput() {
  //arrInput.push(createInput(arrInput.length));
  arrInput.push(arrInput.length);
  //arrInputValue.push(arrInputValue.length);
  arrInputValue.push("");
  display();
}

function display() {
  document.getElementById('parah').innerHTML="";
  for (intI=0;intI<arrInput.length;intI++) {
    document.getElementById('parah').innerHTML+=createInput(arrInput[intI], arrInputValue[intI]);
  }
}

function saveValue(intId,strValue) {
  arrInputValue[intId]=strValue;
}

function createInput(id,value) {
  return "<input type='text' id='test "+ id +"' onChange='javascript:saveValue("+ id +",this.value)' value='"+ value +"'><br>";
}

function deleteInput() {
  if (arrInput.length > 0) {
    arrInput.pop();
    arrInputValue.pop();
  }
  display();
}
// End -->
</script>


<p id="parah">Dynamic creation of input boxes</p>

<a href="javascript:addInput()">Add more input field(s)</a><br>
<a href="javascript:deleteInput()">Remove field(s)</a>

<p><center>
<font face="arial, helvetica" size"-2">Free JavaScripts provided<br>
by <a href="http://javascriptsource.com">The JavaScript Source</a></font>
</center><p>