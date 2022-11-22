<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/atrakcje.css">
</head>
<body>

	<?php
		
		include("connect.php");

		function atrakcje() {
			global $conn;

			$sql = "SELECT * FROM Atrakcje";
			$query = $conn->query($sql);
			
			if($query->num_rows > 0 && $query != false) {
				while($results = $query->fetch_assoc()) {
					$desc = $results['Opis'];
					if(strlen($results['Opis']) > 40) {
						$desc = mb_substr($results['Opis'], 0, 40, "UTF-8");
						$desc .= '...';
					}
					echo "
						<section class='atraction'>
							<section class='photo'>
								<img src='img/{$results['Media']}/photo.jpeg'>
							</section>
				
							<section class='other'>
								<section class='atraction-name'>
									<p>{$results['Nazwa']}</p>
								</section>
				
								<section class='border-name'></section>
				
								<section class='atraction-desc'>
									<p>$desc</p>
								</section>
				
								<section class='view-button'>
									<a href='index.php?strona=atrakcja&id={$results['Id']}'>Zobacz atrakcje</a>
								</section>
							</section>
						</section>
					";
				}
			}
		}
	
	?>

	<section id="search-holder">
		<section id="input-holder">
			<input type="text" name="search" id="search-input" placeholder="Szukaj...">
		</section>

		<section id="submit-holder">
			<input type="submit" name="search-submit" value="Szukaj" id="submit-button">
		</section>
	</section>

	<section id="atractions">
		<?php atrakcje(); ?>
	</section>

</body>
</html>