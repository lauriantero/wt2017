<?php
	include 'connection.php';

	$author = $_POST['author'];
	$id_item = $_POST['id_item'];
	$avatar_url = $_POST['avatar_url'];
	$review = $_POST['review'];
	$rating = $_POST['rating'];


	$sql = "INSERT INTO reviews (author, id_item, avatar_url, review, rating) VALUES ('$author', '$id_item', '$avatar_url', '$review', '$rating')";

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