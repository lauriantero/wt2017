<?php
	include 'connection.php';

	if(isset($_POST['author']) && isset($_POST['avatar']) && isset($_POST['rating']) && isset($_POST['review'])){
		$author = htmlspecialchars($_POST['author']);
		$item = htmlspecialchars($_POST['item']);
		$avatar = htmlspecialchars($_POST['avatar']);
		$rating = htmlspecialchars($_POST['rating']);
		$review = htmlspecialchars($_POST['review']);

		$sql_c = "SELECT * FROM reviews WHERE author='$author'";
		$res_c = mysqli_query($conn, $sql_c);

		if(!mysqli_query($conn, $sql_c))
		{
			echo "The request didn't go as wanted...";
		}
		else if (mysqli_num_rows($res_c) > 0) {
			echo "Entry by this author already existing in database...";
		} else {
			$sql_a = "INSERT INTO reviews (author, id_item, review, rating, time, thumbs_up, thumbs_down, avatar) VALUES ('$author', '$item', '$review', '$rating', CURRENT_TIMESTAMP, 0, 0, '$avatar')";

			if(!mysqli_query($conn, $sql_a))
			{
				echo "The request didn't go as wanted...";
			} else {
				echo "Item successfully added to database!";

				$sql_m = "UPDATE items SET overall_rating=(SELECT AVG(rating) FROM reviews WHERE id_item='$item') WHERE id='$item'";
				$res_m = mysqli_query($conn, $sql_m);
			}
		}
	} else {
		echo "The fields are incorrectly filled...";
	}

	$conn->close();
?>