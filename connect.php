<?php

	$host = "localhost";
	$user = "root";
	$passwd = "";
	$db = "atrakcje_michal";

	$conn = mysqli_connect($host, $user, $passwd, $db);

	if(!$conn) {
		die("Connection field".mysqli_connect_error());
	}

?>