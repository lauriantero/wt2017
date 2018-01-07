<?php
	include 'connection.php';

	if(isset($_POST['item'])){
		$item = htmlspecialchars($_POST['item']);

		$sql = "SELECT * FROM reviews WHERE id_item = '$item'";
		$result = $conn->query($sql);
		$myObj = array();
		$i = 0;

		if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
    			$myObj[$i] = new stdClass();
       			$myObj[$i]->id = $row["id"];
            $myObj[$i]->avatar = $row["avatar"];
       			$myObj[$i]->author = $row["author"];
       			$myObj[$i]->review = $row["review"];
          	$myObj[$i]->rating = $row["rating"];
          	$myObj[$i]->time = $row["time"];
          	$myObj[$i]->thumbs_up = $row["thumbs_up"];
          	$myObj[$i]->thumbs_down = $row["thumbs_down"];
       			$i++;
    		}
    		$myJSON = json_encode($myObj);
    		echo $myJSON;
		} else {
    		echo "No";
		}
	} else {
		echo "error";
	}

	$conn->close();
?>