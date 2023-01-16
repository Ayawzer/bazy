
<?php //error_reporting(0);
    
	include 'autoryzacja.php'; 

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	//echo 'Połączenie udane <br>';
    $idf = $_POST['Id_film'];
    $name = $_POST["nazwa"];
    $type = $_POST["gatunek"];
    $dir = $_POST["rezyser"];
    $year = $_POST["rprod"];
    $lng = $_POST["dlfilmu"];
    $grd = $_POST["ocena"];
    
    
    $sql = "UPDATE Film SET Nazwa='$name',Id_gatunku=$type,Rezyser='$dir',Rok_produkcji='$year',dlugosc_filmu='$lng' WHERE Id_film=$idf;";
    mysqli_query($conn, $sql);
    $sql = "UPDATE Moja_ocena SET Ocena=$grd WHERE Id_film=$idf";

    if ($conn->query($sql) === FALSE) echo "Error: ".$sql."<br>".$conn->error;

    header("location: ./info.php?Id_film=$idf");

    $conn->close();

 ?>
