<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/atrakcje.css">
	<title>Dodawanie wpisów</title>
</head>
<body>
	
<?php
        include("../connect.php");

        if(isset($_POST['delete_atraction'])) {
            delete_atraction();
        }

        function show_all() {
            global $conn;

            $sql = "SELECT * FROM wpisy";
            $query = $conn->query($sql);

            if($query->num_rows > 0 && $query != false) {
                $i = 1;
                while($row = $query->fetch_assoc()) {
                    $short_desc = "";
                    if(strlen($row['Opis']) > 100) {
                        $short_desc = substr($row['Opis'], 0, 150);
                        $short_desc .= "...";
                    }
                    else {
                        $short_desc = $row['Opis'];
                    }

                    echo "
                        <tr>
                            <td>
                                <button id='delte-button' name='delete_atraction' value='{$row['Id']}'>Usuń</button>
                            </td>
                            <td>$i</td>
                            <td>{$row['Nazwa']}</td>
                            <td id='desc'>$short_desc</td>
                            <td>{$row['Zdjecie']}</td>
                        </tr>
                    ";
                    $i++;
                }
            }
        }

        function delete_atraction() {
            global $conn;

            $sql_delte_img = "SELECT * FROM wpisy WHERE Id={$_POST['delete_atraction']}";
            $query_delte_img = $conn->query($sql_delte_img);

            $row = $query_delte_img->fetch_assoc();
            if(unlink('../img/'.$row['Zdjecie'].'/photo.jpeg') && rmdir('../img/'.$row['Zdjecie'])) {
                $sql = "DELETE FROM wpisy WHERE Id={$_POST['delete_atraction']}";
                $query = $conn->query($sql);
            }
        }
    ?>

    <h2>Atrakcje</h2>
    <section id="table-box">
        <form method="POST">
            <table border="1">
                <thead>
                    <th>Usuń</th>
                    <th>Id</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Media</th>
                </thead>

                <tbody>
                    <?php show_all(); ?>
                </tbody>
            </table>
        </form>
    </section>
    
</body>
</html>