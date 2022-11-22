<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/atrakcja.css">
</head>
<body>

    <?php
    
        include("connect.php");

        $array = [];

        function atrakcja() {
            global $conn;

            $id = $_GET['id'];
            $sql = "SELECT * FROM Atrakcje WHERE Id=$id";
            $query = $conn->query($sql);

            $array = [];
            if($query->num_rows > 0 && $query != false) {
                $results = $query->fetch_assoc();
                $array = [
                    "Nazwa"=>$results['Nazwa'],
                    "Opis"=>$results['Opis'],
                    "Zdjecie"=>$results['Media'],
                ];
            }

            return $array;
        }

        $array = atrakcja();

    ?>

    <section id="header-atraction">
        <h2><?php echo $array['Nazwa']?></h2>
    </section>
    
    <section id="photo-atraction">
        <img src="img/<?php echo $array['Zdjecie']?>/photo.jpeg">
    </section>

    <section id="desc">
        <p><?php echo $array['Opis']?></p>
    </section>

</body>
</html>