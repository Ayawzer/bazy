
<?php //error_reporting(0);
    
	include 'autoryzacja.php'; 

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	//echo 'Połączenie udane <br>';

    $name = $_POST["nazwa"];
    $type = $_POST["gatunek"];
    $dir = $_POST["rezyser"];
    $year = $_POST["rprod"];
    $lng = $_POST["dlfilmu"];
    $grd = $_POST["ocena"];
    
    if (isset($name, $lng, $year, $dir, $type, $grd)) header("location: ./index.php?nogrd");
    /*if (isset($lng)) header("location: ./index.php?nolng");
    if (isset($year)) header("location: ./index.php?noyear");
    if (isset($dir)) header("location: ./index.php?nodir");
    if (isset($type)) header("location: ./index.php?notype");
    if (isset($name)) header("location: ./index.php?noname");*/

    $sql = "INSERT INTO Film (Nazwa,Id_gatunku,Rezyser,Rok_produkcji,dlugosc_filmu) values ('$name',$type,'$dir',$year,'$lng');";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO Moja_ocena (Id_film, Ocena) VALUES ('".mysqli_insert_id($conn)."',$grd);";

    if ($conn->query($sql) === FALSE) echo "Error: ".$sql."<br>".$conn->error;
    
    
    header("location: ./index.php");

    $conn->close();

 ?>
