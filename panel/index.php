<?php
	session_start()
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/index.css">
	<title>Pomorze Zachodnie</title>
</head>
<body>

    <header>
		<div id="logo-holder" style="background-image: url('../icon/logo.png');" class="basic-circle-img">
			
		</div>

		<div id="link-holder">
			<a href="index.php?strona=atrakcje" class="header-links">Atrakcje</a>
			<a href="index.php?strona=dodaj-atrakcje" class="header-links">Dodaj atrakcje</a>
			<a href="../index.php" class="header-links" style="margin-right: 100px">Wróć</a>
		</div>
	</header>

	<section id="header-margin"></section>

	<section id="main">
		<?php
            $strona = "atrakcje";    
            if(isset($_GET['strona'])) {
                $strona = $_GET['strona'];
            }

           include($strona.".php");
        ?>
	</section>

</body>
</html>