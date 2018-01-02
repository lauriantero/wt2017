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

	$name = $_POST['name'];
	$year = $_POST['year'];
	$picture = $_POST['picture'];
	$trailer = $_POST['trailer'];
	$type = $_POST['type'];

	$sql = "INSERT INTO items (name, year, picture, trailer, type) VALUES ('$name', '$year', '$picture', '$trailer', '$type')";

	if(!mysqli_query($con, $sql))
	{
		echo 'Not InssERTed';
	}
	else 
	{
		echo 'InserTed';
	}

	header("Location: index.html");
?>