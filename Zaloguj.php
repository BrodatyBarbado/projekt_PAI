<?php
	@include 'connect.php';

	if(isset($_POST['sub'])){

		$name = $_POST['name'];
		$password = md5($_POST['password']);

		$select = " SELECT * FROM users WHERE name = '$name' AND password = '$password' ";

		echo "Kliknieto";
		if ($result = mysqli_query($conn, $select)) {
			if (isset($result) == 1){
			echo "Zalogowano";
			$row = mysqli_fetch_array($result);

			$_SESSION['id'] = $row['id'];
	        $_SESSION['name'] = $row['name'];
	        $_SESSION['password'] = $row['password'];
	        $_SESSION['email'] = $row['email'];

	        header('location:index.php?strona=strona-glowna');
	    	}else{
	    		//echo "Istnieje wiecej niz jeden uzytkownik"
	    	}
		}else{
	    	$error = 'Nie prawidłowa nazwa lub hasło!';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/zaloguj.css">
	<title>Zaloguj</title>
</head>
<body>
	
	<div id="header">

	</div>
	
	<div id="login-box">

		<form>
			<h2>Zaloguj </h2>

			<div class="text-box">
				<input class="usr-pas" type="text" placeholder="Username" name="name" value="">
			</div>

			<div class="text-box">
				<input class="usr-pas" type="password" placeholder="Password" name="password" value="">
			</div>
			
			<input class="btn" type="submit" name="" value="Zaloguj">
			
		</form>
		
	</div>

	
	</body>
</html>