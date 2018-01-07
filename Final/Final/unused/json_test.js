var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        console.log(myObj);
        document.getElementById("demo").innerHTML = myObj[1].name;
        $('#showimg').empty().append("<img src='"+myObj[1].picture+"' />");
    }
};
xmlhttp.open("GET", "php/test_data_recovery.php", true);
xmlhttp.send(); 