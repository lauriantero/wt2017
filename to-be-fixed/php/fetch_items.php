<?php
	// connecting to database
	include 'connection.php';

	// making SQL query to movie/serie item table in database
	$sql = "SELECT name, year, picture, overall_rating, overall_reviews FROM items";
	$result = $conn->query($sql);
	$myObj = array();
	$i = 0;

	// if any results are found, fetch data for selected rows, if not return 0 results
	if ($result->num_rows > 0) {
    	// output data for each row
    	while($row = $result->fetch_assoc()) {
    		$myObj[$i] = new stdClass();
       		$myObj[$i]->name = $row["name"];
       		$myObj[$i]->year = $row["year"];
       		$myObj[$i]->picture = $row["picture"];
			$myObj[$i]->overall_rating = $row["overall_rating"];
			$myObj[$i]->overall_reviews = $row["overall_reviews"];
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