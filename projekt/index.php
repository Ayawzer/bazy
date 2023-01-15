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

    if(isset($_GET['usun'])) {
        mysqli_query($conn, "DELETE FROM Moja_ocena WHERE Id_film=".$_GET['usun'].";");
        mysqli_query($conn, "DELETE FROM Film WHERE Id_film=".$_GET['usun'].";");
    }

    /*if(isset($_GET['usun']))
		//echo "DELETE FROM gracze WHERE gracz_id=".$_GET['usun'].";";
		mysqli_query($conn,"DELETE FROM gracze WHERE gracz_id=".$_GET['usun'].";"); */

    echo '<div class="main">';
    echo '';
        echo '<h1 class="title">MOJA STRONA DO ŚLEDZENIA OBEJRZANYCH FILMÓW</h1>';
    echo '';
        echo '<div class="form">';
            echo '<form class="g1" action="dodaj.php" method="POST">';
                echo '<label for="nazwa">Nazwa:</label><br>';
                echo '<input type="text" id="nazwa" name="nazwa" ';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj nazwe filmu"';
                echo '><br>';
echo '';
                echo '<label for="gatunek">Gatunek id:</label><br>';
                echo '<input type="text" id="gatunek" name="gatunek"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj numer odpowiadajacy gatunkowi"';
                echo '><br>';
echo '';
                echo '<label for="rezyser">Rezyser:</label><br>';
                echo '<input type="text" id="rezyser" name="rezyser"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj rezysera filmu"';    
                echo '><br>';
echo '';
                echo '<label for="rprod">Rok Produkcji:</label><br>';
                echo '<input type="text" id="rprod" name="rprod"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj rok produkcji filmu"';
                echo '><br>';
echo '';
                echo '<label for="dlfilmu">Dlugosc filmu:</label><br>';
                echo '<input type="text" id="dlfilmu" name="dlfilmu"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj dlugosc filmu 0:00"';
                echo '><br>';
echo '';
                echo '<label for="ocena">Moja ocena:</label><br>';
                echo '<input type="text" id="ocena" name="ocena"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj ocene filmu"';
                echo '><br>';
echo '';
                echo '<input type="submit" value="Dodaj">';
            echo '</form>';
echo '';
            echo '<table class="g2">';

            $result = mysqli_query($conn, "SELECT * FROM `Film` LEFT JOIN Moja_ocena ON Film.Id_film=Moja_ocena.Id_film")
            or die("Błąd w zapytaniu do tabeli gracze");
            
            echo '<tbody>';
            while($row = mysqli_fetch_array($result)) {
                
				echo '<tr>';
				    echo '<td>'.$row['Nazwa'].'</td><td>'.$row['dlugosc_filmu'].'</td>';
                    echo '<td>'.$row['Ocena'].'/10</td>';
                    echo '<td><a class="tr__link" href="info.php?Id_film='.$row['Id_film'].'">Sprawdz</a></td>';
                    echo '<td>';
                    if((isset($_GET['Id_film']))&&($_GET['Id_film']==$row['Id_film']))
                        echo '<a class="tr__link" style="background-color: rgb(215, 38, 70);" href="index.php?usun='.$row['Id_film'].'">Potwierdź</a>';
                    else
                        echo '<a class="tr__link" href="index.php?Id_film='.$row['Id_film'].'">Usuń</a>';
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