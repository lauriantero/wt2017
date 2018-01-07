<?php
	include 'connection.php';

	if(isset($_POST['search'])){
		$search = htmlspecialchars($_POST['search']);

		$sql = "SELECT id, name, year, picture, type FROM items WHERE name LIKE '%$search%'";
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
          		$myObj[$i]->type = $row["type"];
       			$i++;
    		}
    		$myJSON = json_encode($myObj);
    		echo $myJSON;
		} else {
    		echo "0 results";
		}
	} else {
		echo "error";
	}

	$conn->close();
?>