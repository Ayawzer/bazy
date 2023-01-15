<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kacper Bryla</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
    include 'autoryzacja.php'; 
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));

    $result = mysqli_query($conn, "SELECT gracze.gracz_id, gracze.imie, gracze.nazwisko, gracze.numer, druzyny.nazwa FROM gracze JOIN druzyny ON gracze.druzyna_id = druzyny.druzyna_id WHERE gracze.gracz_id=".$_GET['gracz_id'].";")
    or die("Błąd w zapytaniu");

    echo '<form action="prezentacja.php" method="post">';
        while($row = mysqli_fetch_array($result)){
        
        echo '<input name="imie" value="'.$row['imie'].'"><br>';
        echo '<input name="nazwisko" value="'.$row['nazwisko'].'"><br>';
        echo '<input name="numer" value="'.$row['numer'].'"><br>';
        echo '<input type="hidden" name="gracz_id" value="'.$row['gracz_id'].'">';

        echo '<input type="submit" value="zmien">';
        }
    echo '</form>';
    
    
		
    ?>
</body>
</html>