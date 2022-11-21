<?php
	@include 'connect.php';

	if(isset($_POST['sub'])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = md5($_POST['password']);
		

		$select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";

		$result = mysqli_query($conn, $select);

		
		$insert = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$password')";
		mysqli_query($conn, $insert);
		//if($result = mysqli_query($conn, $sql))
		header('location:index.php?strona=strona-glowna');
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/zarejestruj.css">
	<title>Zarejestruj</title>
</head>
<body>
	
	<div id="header">

	</div>
	
	<div id="login-box">

		<form method="post">
			<h2>Zarejestruj </h2>

			<div class="text-box">
				<input class="usr-pas" type="text" placeholder="Username" name="name" value="">
			</div>
			
			<div class="text-box">
				<input class="usr-pas" type="Email" placeholder="Email" name="email" value="">
			</div>

			<div class="text-box">
				<input class="usr-pas" type="password" placeholder="Password" name="password" value="">
			</div>

			
			<input class="btn" type="submit" name="sub" value="Zarejestruj">
		</form>
		
	</div>

	
	</body>
</html>