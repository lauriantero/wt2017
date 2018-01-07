<?php
	include 'connection.php';
  if(isset($_POST['id'])){
    $id = htmlspecialchars($_POST['id']);
	  $sql = "UPDATE reviews SET thumbs_up = thumbs_up + 1 WHERE id = '$id'";
	  $result = $conn->query($sql);
  } else {
    echo "error";
  }

  $conn->close();
?>