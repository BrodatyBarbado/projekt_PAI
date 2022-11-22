<?php

	$host = "localhost";
	$user = "root";
	$passwd = "";
	$db = "Atrakcje_michal";

	$conn = mysqli_connect($host, $user, $passwd, $db);

	if(!$conn) {
		die("Connection field".mysqli_connect_error());
	}

?>