<?php
	// connecting to database
	include 'connection.php';

	// making SQL query to reviews table in database
	$sql = "SELECT author, review, rating, thumbs_up, thumbs_down FROM reviews";
	$result = $conn->query($sql);
	$myObj = array();
	$i = 0;

	// if any results are found, fetch data for selected rows, if not return 0 results
	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
    		$myObj[$i] = new stdClass();
       		$myObj[$i]->name = $row["author"];
       		$myObj[$i]->year = $row["review"];
       		$myObj[$i]->picture = $row["rating"];
			$myObj[$i]->overall_rating = $row["thumbs_up"];
			$myObj[$i]->overall_reviews = $row["thumbs_down"];
       		$i++;
		}
		// encode found data to be used in HTML
    	$myJSON = json_encode($myObj);
    	echo $myJSON;
	} else {
    	echo "0 results";
	}
	// close connection to database
	$conn->close();
?>