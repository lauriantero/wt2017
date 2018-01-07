var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var myObj = JSON.parse(this.responseText);
	        console.log(myObj);
	        var countm = 1; 
	        for (i = (myObj.length)-1; i >= 0; i--) { 

	        	if(myObj.length > 3){

	        		if(myObj[i].type == "Movie"){
	        			if(countm != 0){
	        				if(countm==1){
	        					document.getElementById("demom1").innerHTML = myObj[i].name;
			        			$('#showingm1').empty().append("<img src="+myObj[i].picture+" width=\"400\" height=\"480\"/>");
	        					countm = 2; 
	        					continue;
		        			}
		        			if(countm==2){
		        				document.getElementById("demom2").innerHTML = myObj[i].name;
				        		$('#showingm2').empty().append("<img src="+myObj[i].picture+" width=\"300\" height=\"380\"/>");
		        				countm = 3; 
		        				continue;
		        			}
		        			if(countm==3){
		        				document.getElementById("demom3").innerHTML = myObj[i].name;
				        		$('#showingm3').empty().append("<img src="+myObj[i].picture+" width=\"200\" height=\"280\"/>");
		        				countm = 0; 
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
