var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var myObj = JSON.parse(this.responseText);
	        console.log(myObj);
	        var counts = 1; 

	        for (i = (myObj.length)-1; i >= 0; i--) { 

	        	if(myObj.length > 3){

		        	if(myObj[i].type == "Serie"){
	        			if(counts != 0){
	        				if(counts==1){
			        			$('#showings1').empty().append("<br><hr><img src="+myObj[i].picture+" width=\"400\" height=\"480\"/>");
	        					document.getElementById("demos1").innerHTML = "<a id=\"result\" href=\"result.html?item="
                        +myObj[i].id+"\" class=\"load-content\">"+myObj[i].name+"</a><hr>";
	        					counts = 2; 
	        					continue;
		        			}
		        			if(counts==2){
				        		$('#showings2').empty().append("<img src="+myObj[i].picture+" width=\"300\" height=\"380\"/>");
		        				document.getElementById("demos2").innerHTML = "<a id=\"result\" href=\"result.html?item="
                        +myObj[i].id+"\" class=\"load-content\">"+myObj[i].name+"</a><hr>";
		        				counts = 3; 
		        				continue;
		        			}
		        			if(counts==3){
		        				$('#showings3').empty().append("<img src="+myObj[i].picture+" width=\"200\" height=\"280\"/>");
		        				document.getElementById("demos3").innerHTML = "<a id=\"result\" href=\"result.html?item="
                        +myObj[i].id+"\" class=\"load-content\">"+myObj[i].name+"</a><hr>";
		        				counts = 0; 
		        				continue;
	        				}	        			
	        			}	
	        		}
	        	}
	        }
	        
	    }
};

xmlhttp.open("GET", "php/recovery_item.php", true);
xmlhttp.send(); 
