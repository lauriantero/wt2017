$(document).ready(function(){
    $("#item-submit").on("click",function(){    
        if(! $("#item-form")[0].checkValidity()){ 
            alert("Fields not properly completed!");
            return false; 
        } 
        $.ajax({
            url: "php/insert_item.php",
            method: "POST",
            data: $("#item-form").serialize(),
            success: function(response){
                alert(response);
            }
        });  
        return false; // prevent form submitting
    });
});