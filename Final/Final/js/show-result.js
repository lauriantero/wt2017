$(document).ready(function(){

    var item = "item="+$_GET('item');
    var hide = 1;

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
                "<div class=\"row\"><div class=\"col-md-2 tile tile-left\"><img src=\""
                +myObj[0].picture+
                "\" alt=\"Item Image\" width=\"200\" height=\"280\"/></div><div class=\"col-md-6 tile tile-right\"><p>Title : "
                +myObj[0].name+
                "</p><p>Type: "
                +myObj[0].type+
                "</p><p>Released year: "
                +myObj[0].year+
                "</p><p>Overall rating: <span class=\"stars\">"
                +myObj[0].overall_rating+
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

    $("#show-reviews").on("click",function(){  
        console.log(hide);
        if(hide == 1){
            $.ajax({
                url: "php/show_reviews.php",
                method: "POST",
                data: item,
                success: function(response){
                    if(response.indexOf("error") > -1){
                        alert("Wrong ID / Problem with server");
                    } else if(response.indexOf("No") > -1){
                        alert("No reviews");
                    } else {
                        var myReview = JSON.parse(response);
                        document.getElementById("review-content").innerHTML = '';
                        for(var key in myReview){
                            document.getElementById("review-content").innerHTML += 
                            "<hr><div class=\"row\"><div class=\"col-md-2 tile tile-left\"><img src=\""
                            +myReview[key].avatar+
                            "\" alt=\"Avatar\" width=\"80\" height=\"80\"/><span class=\"stars\">"
                            +myReview[key].rating+
                            "</span></div><div class=\"col-md-6 tile tile-right\"><p>Author : "
                            +myReview[key].author+
                            "</p><p>"
                            +myReview[key].review+
                            "</p><button class=\"btn btn-success\"onclick=\"upthumb("+myReview[key].id+")\"><img src=\"img/up.png\" alt=\"+\" width=\"17\" height=\"17\"/>&nbsp;"
                            +myReview[key].thumbs_up+
                            "</button><button class=\"btn btn-danger\"onclick=\"downthumb("+myReview[key].id+")\"><img src=\"img/down.png\" alt=\"+\" width=\"15\" height=\"15\"/>&nbsp;"
                            +myReview[key].thumbs_down+
                            "</button>"
                        }
                        $('#review-content span.stars').stars();
                    }
                }
            });  
            hide = 0;
        } else {
            document.getElementById("review-content").innerHTML = '';
            hide = 1;
        }
    });

    $("#add-review").on("click",function(){ 
        document.getElementById("hidden-content").innerHTML = "<a id=\"review\" href=\"addreview.html?"+item+"\" class=\"load-content\"></a>";
        //Can't focus on review even though document.getElementById("review") is recognized
        document.getElementById("index").focus();
        document.getElementById("review").click();
        document.getElementById("index").blur();
        return false; // prevent form submitting
    });



    upthumb = function(id) {
        $.ajax({
            url: "php/up.php",
            method: "POST",
            data: "id="+id,
            success: function(response){
                if(response.indexOf("error") > -1){
                    alert("Wrong ID / Problem with server");
                } else {
                    $("#show-reviews").click();
                    $("#show-reviews").click();
                }
            }
        });
    }

    downthumb = function(id) {
        $.ajax({
            url: "php/down.php",
            method: "POST",
            data: "id="+id,
            success: function(response){
                if(response.indexOf("error") > -1){
                    alert("Wrong ID / Problem with server");
                } else {
                    $("#show-reviews").click();
                    $("#show-reviews").click();
                }
            }
        });
    }


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