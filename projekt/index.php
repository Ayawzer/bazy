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

    echo '<div class="main">';
    echo '';
        echo '<h1 class="title">MOJA STRONA DO ŚLEDZENIA OBEJRZANYCH FILMÓW</h1>';
    echo '';
        echo '<div class="form">';
        if(isset(($_GET['search']))){
            echo '<form class="g1" action="search.php" method="POST">';
        } else {
            echo '<form class="g1" action="dodaj.php" method="POST">';
        }
                echo '<label for="nazwa">Nazwa:</label><br>';
                echo '<input type="text" id="nazwa" name="nazwa" ';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj nazwe filmu"';
                echo '><br>';
echo '';
            if(isset(($_GET['search']))) {

            } else {
                echo '<label for="gatunek">Gatunek:</label><br>';
                echo '<select name="gatunek" id="gatunek">';
                    echo '<option value="1">Thriller</option>';
                    echo '<option value="2">Familijny</option>';
                    echo '<option value="3">Horror</option>';
                    echo '<option value="4">Fantasy</option>';
                    echo '<option value="5">Science fiction</option>';
                    echo '<option value="6">Romans</option>';
                    echo '<option value="7">Musical</option>';
                    echo '<option value="8">Akcja</option>';
                    echo '<option value="9">Komedia</option>';
                    echo '<option value="10">Anime</option>';
                    echo '<option value="11">Dramat</option>';
                    echo '<option value="12">Dokument</option>';
                echo '</select>';
                echo '<br>';
echo '';
                echo '<label for="rezyser">Reżyser:</label><br>';
                echo '<input type="text" id="rezyser" name="rezyser"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj rezysera filmu"';    
                echo '><br>';
echo '';
                echo '<label for="rprod">Rok Produkcji:</label><br>';
                echo '<input type="text" id="rprod" name="rprod"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj rok produkcji filmu"';
                echo '><br>';
echo '';
                echo '<label for="dlfilmu">Długość filmu:</label><br>';
                echo '<input type="text" id="dlfilmu" name="dlfilmu"';
                if(isset($_GET['nogrd'])) echo 'placeholder="Podaj dlugosc filmu 0:00"';
                echo '><br>';
echo '';
                echo '<label for="ocena">Moja ocena:</label><br>';
                echo '<select name="ocena" id="ocena">';
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    echo '<option value="10">10</option>';
                echo '</select>';
                echo '<br>';
        }
echo '';
                if(isset(($_GET['search']))) {
                    echo '<input type="submit" value="Szukaj">';
                    echo '<a href="index.php" class="backa">Wróć</a>';
                } else {
                    echo '<input type="submit" value="Dodaj">';
                }

                if(isset(($_GET['search']))) {
                } else {
                    echo '<a class="search" href="index.php?search">Przejdź do formularza wyszukiwania</a>';
                }
            echo '</form>';
            
echo '';
            echo '<table class="g2">';
            $result = mysqli_query($conn, "SELECT * FROM `Film` LEFT JOIN Moja_ocena ON Film.Id_film=Moja_ocena.Id_film")
            or die("Błąd w zapytaniu do tabeli gracze");
            
            echo '<tbody>';
            while($row = mysqli_fetch_array($result)) {
                
                if((isset($_GET['search']))&&($_GET['search']==$row['Id_film'])) {
                    echo '<tr style="border: 3px solid rgb(234 179 8);">';
                } else {
                    echo '<tr>';
                }
				    echo '<td>'.$row['Nazwa'].'</td><td>'.$row['dlugosc_filmu'].'</td>';
                    echo '<td>'.$row['Ocena'].'/10</td>';
                    echo '<td><a class="tr__link" href="info.php?Id_film='.$row['Id_film'].'">Sprawdź</a></td>';
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
    echo '</div>';
?>
</body>
</html>