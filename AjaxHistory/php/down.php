<?php
	include 'connection.php';
  if(isset($_POST['id'])){
    $id = htmlspecialchars($_POST['id']);
	  $sql = "UPDATE reviews SET thumbs_down = thumbs_down + 1 WHERE id = '$id'";
	  $result = $conn->query($sql);
  } else {
    echo "error";
  }

  $conn->close();
?>