<?php
	include 'connection.php';

	if(isset($_POST['item'])){
		$item = htmlspecialchars($_POST['item']);

		$sql = "SELECT * FROM items WHERE id = '$item'";
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
          		$myObj[$i]->trailer = $row["trailer"];
          		$myObj[$i]->overall_rating = $row["overall_rating"];
          		$myObj[$i]->overall_reviews = $row["overall_reviews"];
          		$myObj[$i]->type = $row["type"];
       			$i++;
    		}
    		$myJSON = json_encode($myObj);
    		echo $myJSON;
		} else {
    		echo "error";
		}
	} else {
		echo "error";
	}

	$conn->close();
?>