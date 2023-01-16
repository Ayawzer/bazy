<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_info.css">
    <title>Kacper Bryla</title>
</head>
<body>
    <?php
include 'autoryzacja.php'; 
	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));


if (isset($_GET['zmien'])) {

    $result = mysqli_query($conn, "SELECT Film.Id_film, Film.Nazwa, Gatunek.Gatunek, Film.Rezyser, Film.Rok_produkcji, Film.dlugosc_filmu, Moja_ocena.Ocena 
                                FROM Film
                                INNER JOIN Moja_ocena
                                ON Film.Id_film = Moja_ocena.Id_film
                                INNER JOIN Gatunek
                                ON Film.Id_gatunku = Gatunek.Id_gatunku
                                WHERE Film.Id_film=".$_GET['zmien'].";")

    or die("Błąd w zapytaniu do tabeli gracze");
} else {
    $result = mysqli_query($conn, "SELECT Film.Id_film, Film.Nazwa, Gatunek.Gatunek, Film.Rezyser, Film.Rok_produkcji, Film.dlugosc_filmu, Moja_ocena.Ocena 
                                FROM Film
                                INNER JOIN Moja_ocena
                                ON Film.Id_film = Moja_ocena.Id_film
                                INNER JOIN Gatunek
                                ON Film.Id_gatunku = Gatunek.Id_gatunku
                                WHERE Film.Id_film=".$_GET['Id_film'].";")

    or die("Błąd w zapytaniu do tabeli gracze");
}

$row = mysqli_fetch_array($result);

echo '<div class="main">';

    echo '<h1 class="title">Informacje o filmie '.$row['Nazwa'].'</h1>';
    if ((isset($_GET['zmien']))&& ($_GET['zmien']==$row['Id_film'])) echo '<form action="modify.php" method="POST" id="form"</form>';
    echo '<table class="main__table">';
        echo '<tr>';
            echo '<th>Nazwa</th>';
            echo '<th>Gatunek</th>';
            echo '<th>Rezyser</th>';
            echo '<th>Rok Produkcji</th>';
            echo '<th>Dlugosc filmu</th>';
            echo '<th>Moja ocena</th>';
        echo '</tr>';
        
        echo '<tr>';
        if ((isset($_GET['zmien']))&& ($_GET['zmien']==$row['Id_film'])) {
            echo '<input type="hidden" name="Id_film" value="'.$row['Id_film'].'">';
            echo '<td><input type="text" name="nazwa" value="'.$row['Nazwa'].'"></input></td>';
            echo '<td><select name="gatunek" id="gatunek">';
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
            echo '</select></td>';
            echo '<td><input type="text" name="rezyser" value="'.$row['Rezyser'].'"></input></td>';
            echo '<td><input type="text" name="rprod" value="'.$row['Rok_produkcji'].'"></input></td>';
            echo '<td><input type="text" name="dlfilmu" value="'.$row['dlugosc_filmu'].'"></input></td>';
            echo '<td><select name="ocena" id="ocena">';
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
            echo '</select></td>';
        } else {
            echo '<td>'.$row['Nazwa'].'</td><td>'.$row['Gatunek'].'</td><td>'.$row["Rezyser"].'</td><td>'.$row['Rok_produkcji'].'</td><td>'.$row['dlugosc_filmu'].'</td><td>'.$row['Ocena'].'</td>';
        }
        echo '</tr>';
        

    echo '</table>';

    echo '<div class="back">';
        echo '<a href="index.php" class="back_a">Wróć</a>';
        echo '<a href="info.php?zmien='.$row['Id_film'].'" class="back_a">Modyfikuj</a>';
        if ((isset($_GET['zmien']))&& ($_GET['zmien']==$row['Id_film'])) echo '<input type="submit" value="Potwierdź wprowadzone zmiany">';
    echo '</div>';
        echo '</div>';

echo '</div>';
?>
</body>
</html>