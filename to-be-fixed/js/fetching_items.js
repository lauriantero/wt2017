var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        console.log(myObj);
        document.getElementById("nameyear").innerHTML = myObj[1].name + " (" + myObj[1].year + ") ";
        document.getElementById("rating").innerHTML = "User Rating: " + myObj[1].overall_rating;
        document.getElementById("reviews").innerHTML = "Number of Reviews: " + myObj[1].overall_reviews;
        $('#picturecontainer').empty().append("<img src='"+myObj[1].picture+"' />");
    }
};
xmlhttp.open("GET", "php/fetch_items.php", true);
xmlhttp.send(); 