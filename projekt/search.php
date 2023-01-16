<?php //error_reporting(0);
    
	include 'autoryzacja.php'; 

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	//echo 'Połączenie udane <br>';

    $name = $_POST["nazwa"];

    $idf = "SELECT Id_film FROM Film WHERE Nazwa='$name';";

    $result = mysqli_query($conn, $idf)
    or die("Błąd w zapytaniu do tabeli gracze");

    $row = mysqli_fetch_array($result);    
    
    header("location: ./index.php?search=".$row['Id_film']."");

    $conn->close();

 ?>