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
                var myObj = JSON.parse(response);
                document.getElementById("result-content").innerHTML = 
                "<div class=\"row\"><div class=\"col-md-2 tile tile-left\"><img id=\"sampleimage\" src=\""
                +myObj[0].picture+
                "\" alt=\"Item Image\" width=\"200\" height=\"280\"/></div><div class=\"col-md-6 tile tile-right\"><p>Title : "
                +myObj[0].name+
                "</p><p>Type: "
                +myObj[0].type+
                "</p><p>Released year: "
                +myObj[0].year+
                "</p><p>Overall rating: <span class=\"stars\">"
                +myObj[0].overall_rating+
                "</span></p><p>Overall reviews: <span class=\"stars\">"
                +myObj[0].overall_reviews+
                "</span></p></div></div><br/>"
                if(myObj[0].trailer){
                    document.getElementById("result-content").innerHTML += 
                    "<div class=\"row text-center\"><p>Trailer</p><iframe width=\"420\" height=\"315\" src=\""
                    +myObj[0].trailer+
                    "\"></iframe></div>"
                }
                $('span.stars').stars();
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

    $.fn.stars = function() {
        return $(this).each(function() {
            // Get the value
            var val = parseFloat($(this).html());
            // Make sure that the value is in 0 - 5 range, multiply to get width
            var size = Math.max(0, (Math.min(5, val))) * 16;
            // Create stars holder
            var $span = $('<span />').width(size);
            // Replace the numerical value with stars
            $(this).html($span);
        });
    }
});