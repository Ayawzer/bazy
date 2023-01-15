
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

    if (empty($name)) header("location: ./index.php?noname");
    if (empty($type)) header("location: ./index.php?notype");
    if (empty($dir)) header("location: ./index.php?nodir");
    if (empty($year)) header("location: ./index.php?noyear");
    if (empty($lng)) header("location: ./index.php?nolng");

    $sql = "INSERT INTO Film (Nazwa,Id_gatunku,Rezyser,Rok_produkcji,dlugosc_filmu) values ('$name',$type,'$dir',$year,'$lng')";

    if ($conn->query($sql) === FALSE) echo "Error: ".$sql."<br>".$conn->error;
    
    
    header("location: ./index.php");

    $conn->close();

 ?>
