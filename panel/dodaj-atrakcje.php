<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/dodaj-atrakcje.css">
	<title>Dodawanie wpisów</title>
</head>
<body>
	
	<?php
	
		include("../connect.php");

        function add_atraction() {
            global $conn;

            $sql_check = "SELECT * FROM wpisy WHERE Nazwa='{$_POST['Nazwa']}'";
            $query = $conn->query($sql_check);

            if($query->num_rows != 0) {
                echo "Istnieje już atrakcja o tej nazwie";
            }
            else {
				$lower_case = strtolower($_POST['folder_name']);
            	mkdir("img/$lower_case", 0777, true);
				$target_dir = "img/$lower_case/";
                $target_file = $target_dir . basename($_FILES["Plik"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                if(isset($_POST["dodaj"])) {
                    $check = getimagesize($_FILES["Plik"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

				$file_name = explode('.', basename($_FILES["Plik"]["name"]));
				if($file_name[0] != "photo") {
					echo "Plik nie nazywa się photo.";
					rmdir("img/$lower_case");
					$uploadOk = 0;
				}

				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				if($imageFileType != "jpeg" ) {
					echo "Plik musi być o rozszerzeniu jpeg";
					rmdir("img/$lower_case");
					$uploadOk = 0;
				}
    
                if($uploadOk == 1) {
                    $sql = "INSERT INTO wpisy(Nazwa, Opis, Zdjecie) VALUES('{$_POST['Nazwa']}', '{$_POST['Opis']}', '{$_POST['folder_name']}')";
                    $query = $conn->query($sql);

                    if($query) {
                        move_uploaded_file($_FILES["Plik"]["tmp_name"], $target_file);
                        echo "<script>alert('Dodano atrakcje!');</script>";
                    }
                    else {
						rmdir("img/$lower_case");
                        echo "<script>alert('Coś poszło nie tak!');</script>";
                    }
                }
            }
        }

	?>

	
	<div id="add-atraction-box">
		<form method="POST" enctype="multipart/form-data">
			<h2>Dodaj wpis</h2>

			<article class="text-box">
				<input class="usr-pas" type="text" required placeholder="Nazwa" name="Nazwa" value="">

				<input class="usr-pas" type="text" required placeholder="Nazwa folderu taka sama jak nazwa atrakcji" name="folder_name" value="">

				<textarea class="usr-pas" id="opis" type="text" required placeholder="Opis" name="Opis" value=""></textarea>

				<input class="sss" type="file" required name="Plik" value="">

			</article>
			
			<input class="btn" type="submit" name="btn" value="Dodaj Wpis">

			<p id="error"><?php 
				if(isset($_POST['btn'])) {
					add_atraction();
				}
			?></p>
		</form>
	</div>

	
	</body>
</html>