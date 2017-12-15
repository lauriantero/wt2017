<?php
	include 'connection.php';
	$sql = "SELECT id, name, year FROM items";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    	// output data of each row
    	while($row = $result->fetch_assoc()) {
       		echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Year: " . $row["year"]. "<br>";
    	}
	} else {
    	echo "0 results";
	}
	$conn->close();
?>