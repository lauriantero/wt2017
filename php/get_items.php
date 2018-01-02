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


	$sql = "SELECT id, name FROM items";
	$result = mysqli_query($con, $sql);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}
	echo json_encode($rows);

?>