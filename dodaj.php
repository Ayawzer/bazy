
<?php //error_reporting(0);
    
	include 'autoryzacja.php'; 

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	echo 'Połączenie udane <br>';
	
	$result = mysqli_query($conn, "SELECT * FROM gracze;")
	or die("Błąd w zapytaniu do tabeli gracze");

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $did = $_POST["did"];
    $number = $_POST["number"];

    $sql = "INSERT INTO gracze (imie,nazwisko,druzyna_id,numer) values ('$fname','$lname',$did,$number)";

    if ($conn->query($sql) === TRUE) {
        echo "ADDED: ".$fname.", ".$lname.", ".$did;
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
    
    header("location: ./form.php?error=none");

    $conn->close();

 ?>
