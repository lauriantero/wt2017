$(document).ready(function(){

    var item = "item="+$_GET('item');
    $.ajax({
        url: "php/show_item.php",
        method: "POST",
        data: item,
        success: function(response){
            if(response.indexOf("error") > -1){
                alert("Wrong ID / Problem with server");
            } else {
                console.log(response);
                var myObj = JSON.parse(response);
                console.log(myObj);
                console.log(myObj[0].id);
                document.getElementById("result-content").innerHTML = 
                "<div class=\"row\"><div class=\"col-md-2 tile tile-left\"><img id=\"sampleimage\" src=\""
                +myObj[0].picture+
                "\" alt=\"Item Image\" width=\"200\" height=\"280\"/></div><div class=\"col-md-6 tile tile-right\"><p>Title : "
                +myObj[0].name+
                "</p><p>Type: "
                +myObj[0].type+
                "</p><p>Released year: "
                +myObj[0].year+
                "</p><p>Overall rating: "
                +myObj[0].overall_rating+
                "</p><p>Overall reviews: "
                +myObj[0].overall_reviews+
                "</p></div></div><br/>"
                console.log(myObj[0].trailer);
                if(myObj[0].trailer){
                    document.getElementById("result-content").innerHTML += 
                    "<div class=\"row text-center\"><p>Trailer</p><iframe width=\"420\" height=\"315\" src=\""
                    +myObj[0].trailer+
                    "\"></iframe></div>"
                }
            }
        }
    });  

    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace( 
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );
    
        if ( param ) {
            return vars[param] ? vars[param] : null;    
        }
        return vars;
    }
});