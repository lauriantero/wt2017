$(document).ready(function(){

    var item = "item="+$_GET('item');

    $("#review-submit").on("click",function(){    
        if(! $("#review-form")[0].checkValidity()){ 
            alert("Fields not properly completed!");
            return false; 
        } 
        $.ajax({
            url: "php/insert_review.php",
            method: "POST",
            data: item+"&"+$("#review-form").serialize(),
            success: function(response){
                alert(response);
            }
        });  
        return false; // prevent form submitting
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