<script language="javascript">
fields = 0;
function addInput() {
if (fields != 10) {
document.getElementById('text').innerHTML += "<input type='text' value='' name='field[]' /><br />";
fields += 1;
} else {
document.getElementById('text').innerHTML += "<br />Only 10 upload fields allowed.";
document.form.add.disabled=true;
}
}
</script>