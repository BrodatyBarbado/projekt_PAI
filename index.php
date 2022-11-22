<?php
	session_start()
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/index.css">
	<title>Pomorze Zachodnie</title>
</head>
<body>

    <header>
		<div id="logo-holder" style="background-image: url('icon/logo.png');" class="basic-circle-img">
			
		</div>

		<div id="link-holder">
			<a href="index.php?strona=strona-glowna" class="header-links">Strona główna</a>
			<a href="index.php?strona=atrakcje" class="header-links" id="last-link">Atrakcje</a>
			<a href="index.php?strona=wpisy" class="header-links">Wpisy</a>
			<a href="index.php?strona=o_firmie" style="margin-right:74px;" class="header-links">O firmie</a>
			<a href="index.php?strona=zaloguj" class="header-links">Zaloguj</a>
			<a href="index.php?strona=zarejestruj" class="header-links">Zarejstruj</a>
		</div>
	</header>

	<section id="header-margin"></section>

	<section id="main">
		<?php
            $strona = "strona-glowna";    
            if(isset($_GET['strona'])) {
                $strona = $_GET['strona'];
            }

           include($strona.".php");
        ?>
	</section>

	<footer>
		<h2> Autor: Michał Śmieszniak</h2>
		<?php
			if(isset($_SESSION['name'])){
				echo "<b>" . "Witaj " . $_SESSION['name'] . "</b>";
			// }else{
			// 	echo "<b id='Nzalogowany'>" . "Jestes niezalogowany" . "</b>";
			}
		?>
	</footer>

</body>
</html>