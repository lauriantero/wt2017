<?php

	include 'connection.php';

	$name = $_POST['name'];
	$year = $_POST['year'];
	$picture = $_POST['picture'];
	$trailer = $_POST['trailer'];
	$type = $_POST['type'];

	$sql = "INSERT INTO items (name, year, picture, trailer, type) VALUES ('$name', '$year', '$picture', '$trailer', '$type')";

	if(!mysqli_query($conn, $sql))
	{
		echo 'Error while adding new item';
	}
	else 
	{
		echo 'Done';
	}

	$conn->close();
?>