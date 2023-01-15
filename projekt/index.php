<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Kacper Bryla</title>
</head>
<body>
<?php

    include 'autoryzacja.php'; 
	
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));

    //echo 'Połączenie udane <br>';

    echo '<div class="main">';
    echo '';
        echo '<h1 class="title">MOJA STRONA DO ŚLEDZENIA OBEJRZANYCH FILMÓW</h1>';
    echo '';
        echo '<div class="form">';
            echo '<form class="g1" action="dodaj.php" method="POST">';
                echo '<label for="nazwa">Nazwa:</label><br>';
                echo '<input type="text" id="nazwa" name="nazwa" ';
                if(isset($_GET['noname'])) echo 'placeholder="Podaj nazwe filmu"';
                echo '><br>';
echo '';
                echo '<label for="gatunek">Gatunek id:</label><br>';
                echo '<input type="text" id="gatunek" name="gatunek"';
                if(isset($_GET['notype'])) echo 'placeholder="Podaj numer odpowiadajacy gatunkowi"';
                echo '><br>';
echo '';
                echo '<label for="rezyser">Rezyser:</label><br>';
                echo '<input type="text" id="rezyser" name="rezyser"';
                if(isset($_GET['nodir'])) echo 'placeholder="Podaj rezysera filmu"';    
                echo '><br>';
echo '';
                echo '<label for="rprod">Rok Produkcji:</label><br>';
                echo '<input type="text" id="rprod" name="rprod"';
                if(isset($_GET['noyear'])) echo 'placeholder="Podaj rok produkcji filmu"';
                echo '><br>';
echo '';
                echo '<label for="dlfilmu">Dlugosc filmu:</label><br>';
                echo '<input type="text" id="dlfilmu" name="dlfilmu"';
                if(isset($_GET['nolng'])) echo 'placeholder="Podaj dlugosc filmu"';
                echo '><br>';
echo '';
                echo '<label for="ocena">Moja ocena:</label><br>';
                echo '<input type="text" id="ocena" name="ocena"';
                if(isset($_GET['norate'])) echo 'placeholder="Podaj ocene filmu"';
                echo '><br>';
echo '';
                echo '<input type="submit" value="Dodaj">';
            echo '</form>';
echo '';
            echo '<table class="g2">';

            $result = mysqli_query($conn, "SELECT * FROM `Film`")
            or die("Błąd w zapytaniu do tabeli gracze");
            
            echo '<tbody>';
            while($row = mysqli_fetch_array($result)) {
                
				echo '<tr>';
				    echo '<td>'.$row['Nazwa'].'</td><td>'.$row['dlugosc_filmu'].'</td>';
                    echo '<td>4/10</td>';
                    echo '<td><a class="tr__link" href="info.php">Sprawdz</a></td>';
                    echo '<td>';
                        echo '<a class="tr__link" href="#">Usuń</a>';
                    echo '</td>';
                    
				echo '</tr>';
				
			};
			echo '</tbody>';
			echo '</table>';

    echo '</div>';
echo '';
    echo '<h1 class="hlegend">Legenda gatunków:</h1>';
echo '';
    echo '<div class="legend">';
echo '';
        echo '<p>1 - Thiller</p>';
        echo '<p>2 - Familijny</p>';
        echo '<p>3 - Horror</p>';
        echo '<p>4 - Fantasy</p>';
        echo '<p>5 - Science fiction</p>';
        echo '<p>6 - Romans</p>';
        echo '<p>7 - Muscial</p>';
        echo '<p>8 - Akcja</p>';
        echo '<p>9 - Komedia</p>';
        echo '<p>10 - Anime</p>';
        echo '<p>11 - Dramat</p>';
        echo '<p>12 - Dokument</p>';
        echo '</div>';
        echo '</div>';
?>
</body>
</html>