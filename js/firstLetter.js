function myFunction(id) {
    var txt = document.getElementById(id);
    txt.value = txt.value.replace(/\w\S*/g, function (txt) { return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase(); });
}