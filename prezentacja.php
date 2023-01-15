<!DOCTYPE html>
	<html>
		<head>
			<title> Kacper Bryla </title>
			<meta charset="utf-8">
		<style>
			table,td,th {
				border: solid 1px;
			}
		</style>
		</head>
		<body>

<?php
	include 'autoryzacja.php'; 
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
	or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));
	
	//echo 'Połączenie udane <br>';
	
	if(isset($_GET['usun']))
		//echo "DELETE FROM gracze WHERE gracz_id=".$_GET['usun'].";";
		mysqli_query($conn,"DELETE FROM gracze WHERE gracz_id=".$_GET['usun'].";");
	
        

	echo "<h1>Gracze:</h1>";
	
	
			echo '<table>';
				

	
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
				or die ('Błąd połączenia z serwerem: ' . mysqli_error($conn));

				$result = mysqli_query($conn, "SELECT gracze.gracz_id, gracze.imie, gracze.nazwisko, gracze.numer, druzyny.nazwa FROM gracze JOIN druzyny ON gracze.druzyna_id = druzyny.druzyna_id;")
				or die("Błąd w zapytaniu do tabeli gracze");

				while($row = mysqli_fetch_array($result)) {
				echo '<tr';
				if((isset($_GET['gracz_id']))&&($_GET['gracz_id']==$row['gracz_id'])) echo ' style="background-color:yellow"';
				echo '>';
				echo '<td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['numer'].'</td><td>'.$row['nazwa'].'</td>';
				echo '<td>';
				if((isset($_GET['gracz_id']))&&($_GET['gracz_id']==$row['gracz_id']))
					echo '<a href="prezentacja.php?usun='.$row['gracz_id'].'">potwierdz</a>';
				else
					echo '<a href="prezentacja.php?gracz_id='.$row['gracz_id'].'">usun</a>';
				echo '</td>';
				echo '</tr>';
				
			};
			
			echo '</table>';
		?>
	</table>
		</body>
	</html>
