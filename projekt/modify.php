
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
    
    /*if (isset($lng)) header("location: ./index.php?nolng");
    if (isset($year)) header("location: ./index.php?noyear");
    if (isset($dir)) header("location: ./index.php?nodir");
    if (isset($type)) header("location: ./index.php?notype");
    if (isset($name)) header("location: ./index.php?noname");*/

    /*$sql = "UPDATE Film SET 'Nazwa'=".$name." 'Id_gatunky'=".$type." 'Rezyser'=".$dir." WHERE gracz_id=".$_GET['usun'].";";
    mysqli_query($conn, $sql);
*/
    
    $sql = "UPDATE Film SET Nazwa='$name',Id_gatunku=$type,Rezyser='$dir',Rok_produkcji='$year',dlugosc_filmu='$lng' WHERE Id_film=$idf;";
    mysqli_query($conn, $sql);
    $sql = "UPDATE Moja_ocena SET Ocena=$grd WHERE Id_film=$idf";

    if ($conn->query($sql) === FALSE) echo "Error: ".$sql."<br>".$conn->error;

    header("location: ./info.php?Id_film=$idf");

    $conn->close();

 ?>
