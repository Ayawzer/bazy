<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacper Bryła</title>
</head>
<body>
<form action="dodaj.php" method="POST">
        <label for="fname">Imie:</label><br>
        <input type="text" id="fname" name="fname"><br>

        <label for="lname">Nazwisko:</label><br>
        <input type="text" id="lname" name="lname"><br>

        <label for="did">Druzyna id:</label><br>
        <input type="text" id="did" name="did"><br>

        <label for="number">Numer:</label><br>
        <input type="text" id="number" name="number"><br>

        <input type="submit" value="Submit">
    </form> 

    <table id="tabela">
        <tr>
            <th>Imie</th>
            <th>Nazwisko</th>
        </tr>

        <?php
        include 'autoryzacja.php'; 

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
        or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));

        $result = mysqli_query($conn, "SELECT * FROM gracze;")
        or die("Błąd w zapytaniu do tabeli gracze");

        while($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td>';
        echo '</tr>';
        
    };
    echo '</table>';
    $conn->close();

    if (isset($_GET['error'])) {
        if($_GET['error'] === "none") {
            echo "<script>document.getElementById('tabela').lastElementChild.lastElementChild.style.backgroundColor='lightblue'</script>";
        }
    }
?>

</body>
</html>