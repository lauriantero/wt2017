<?php
	include 'connection.php';

	$sql = "SELECT id, name, year, picture  FROM items";
	$result = $conn->query($sql);
	$myObj = array();
	$i = 0;

	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
    		$myObj[$i] = new stdClass();
       		$myObj[$i]->id = $row["id"];
       		$myObj[$i]->name = $row["name"];
       		$myObj[$i]->year = $row["year"];
          $myObj[$i]->picture = $row["picture"];
       		$i++;
    	}
    	$myJSON = json_encode($myObj);
    	echo $myJSON;
	} else {
    	echo "0 results";
	}
	$conn->close();
?>