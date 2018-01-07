$(document).ready(function(){

    var search = $_GET('search');
    document.getElementById("index").blur();
    $('input[name=search]').val(search);

    $("#search-submit").on("click",function(){    
        if(! $("#search-form")[0].checkValidity()){ 
            alert("Fields not properly completed!");
            return false; 
        } 
        $.ajax({
            url: "php/search_item.php",
            method: "POST",
            data: $("#search-form").serialize(),
            success: function(response){
                if(response.indexOf("0 results") > -1){
                    document.getElementById("found-content").innerHTML = '';
                    $('input[name=bar-term]').val($('input[name=search]').val());
                    alert("No results found");
                } else if(response.indexOf("error") > -1){
                    alert("Fields not properly completed!");
                } else {
                    document.getElementById("found-content").innerHTML = '';
                    $('input[name=bar-term]').val($('input[name=search]').val());
                    console.log(response);
                    var myObj = JSON.parse(response);
                    console.log(myObj);
                    for(var key in myObj){
                        console.log(myObj[key].id);
                        document.getElementById("found-content").innerHTML += 
                        "<hr><div class=\"row\"><div class=\"col-md-2 tile tile-left\"><img id=\"sampleimage\" src=\""
                        +myObj[key].picture+
                        "\" alt=\"Movie Image\" width=\"50\" height=\"70\"/></div><div class=\"col-md-6 tile tile-right\"><a id=\"result\" href=\"result.html?item="
                        +myObj[key].id+"\" class=\"load-content\">"
                        +myObj[key].name+
                        "</a><p class=\"text-secondary\">"
                        +myObj[key].type+
                        "</p></div></div>"
                    }
                }
            }
        });  
        return false; // prevent form submitting
    });

    $("#search-submit").click();

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