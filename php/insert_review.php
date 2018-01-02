<?php
	
	$con = mysqli_connect('127.0.0.1','root','','testi');

	if(!$con)
	{
		echo 'Not Connected tu SERVEr';
	}
	if(!mysqli_select_db($con, 'testi'))
	{
		echo 'Database nUT SELEcted';
	}

	$author = $_POST['author'];
	$id_item = $_POST['id_item'];
	$avatar_url = $_POST['avatar_url'];
	$review = $_POST['review'];
	$rating = $_POST['rating'];


	$sql = "INSERT INTO reviews (author, id_item, avatar_url, review, rating) VALUES ('$author', '$id_item', '$avatar_url', '$review', '$rating')";

	if(!mysqli_query($con, $sql))
	{
		throw new Exception('Could not add review ;(');
	}
	else 
	{
		echo 'InserTed';
	}

?>