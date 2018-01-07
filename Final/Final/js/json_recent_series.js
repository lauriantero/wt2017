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
	        					document.getElementById("demos1").innerHTML = myObj[i].name;
			        			$('#showings1').empty().append("<img src="+myObj[i].picture+" width=\"400\" height=\"480\"/>");
	        					counts = 2; 
	        					continue;
		        			}
		        			if(counts==2){
		        				document.getElementById("demos2").innerHTML = myObj[i].name;
				        		$('#showings2').empty().append("<img src="+myObj[i].picture+" width=\"300\" height=\"380\"/>");
		        				counts = 3; 
		        				continue;
		        			}
		        			if(counts==3){
		        				document.getElementById("demos3").innerHTML = myObj[i].name;
				        		$('#showings3').empty().append("<img src="+myObj[i].picture+" width=\"200\" height=\"280\"/>");
		        				counts = 0;
		        				continue; 
	        				}
	        			}
		        			
	        		}
	        	}
	        }
	        
	    }
};

xmlhttp.open("GET", "php/test_data_recovery.php", true);
xmlhttp.send(); 
