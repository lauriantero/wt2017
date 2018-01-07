$(document).ready(function(){
    $("#bar-submit").on("click",function(){ 
    	var data = document.getElementById("bar-term").value;
    	document.getElementById("hidden-content").innerHTML = "<a id=\"result\" href=\"select.html?search="+data+"\" class=\"load-content\"></a>";
    	document.getElementById("bar-term").blur();
    	document.getElementById("bar-submit").blur();
    	//Can't focus on result even though document.getElementById("result") is recognized
    	document.getElementById("index").focus();
    	document.getElementById("result").click();
    	return false; // prevent form submitting
   	});
});   