<?php 
	// making a connection with the data base
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// check the connection
	if (mysqli_connect_errno()) {
		echo "the conneection has failed.";
	}

?>