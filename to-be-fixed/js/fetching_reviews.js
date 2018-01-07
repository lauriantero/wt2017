var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
        console.log(myObj);
        document.getElementById("author").innerHTML = " " + myObj[1].author + " ";
        document.getElementById("review").innerHTML = myObj[1].review;
        document.getElementById("ratings").innerHTML = " User Rating: " + myObj[1].rating;
        document.getElementById("thumbs_up").innerHTML = " " + myObj[1].thumbs_up;
        document.getElementById("thumbs_down").innerHTML = " " + myObj[1].thumbs_down;
    }
};
xmlhttp.open("GET", "php/fetch_reviews.php", true);
xmlhttp.send(); 