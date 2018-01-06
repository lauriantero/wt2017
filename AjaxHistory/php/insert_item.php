<?php
	include 'connection.php';

	if(isset($_POST['name']) && isset($_POST['year']) && isset($_POST['picture']) && isset($_POST['trailer']) && isset($_POST['type'])){
		$name = htmlspecialchars($_POST['name']);
		$year = htmlspecialchars($_POST['year']);
		$picture = htmlspecialchars($_POST['picture']);
		$trailer = htmlspecialchars($_POST['trailer']);
		$type = htmlspecialchars($_POST['type']);

		$sql_c = "SELECT * FROM items WHERE name='$name'";
		$res_c = mysqli_query($conn, $sql_c);

		if(!mysqli_query($conn, $sql_c))
		{
			echo "The request didn't go as wanted...";
		}
		else if (mysqli_num_rows($res_c) > 0) {
			echo "Entry already existing in database...";
		} else {
			$sql_a = "INSERT INTO items (name, year, picture, trailer, type) VALUES ('$name', '$year', '$picture', '$trailer', '$type')";

			if(!mysqli_query($conn, $sql_a))
			{
				echo "The request didn't go as wanted...";
			} else {
				echo "Item successfully added to database!";
			}
		}
	} else {
		echo "The fields are incorrectly filled...";
	}

	$conn->close();
?>