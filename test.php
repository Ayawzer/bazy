<?php
 $dbhost = 'localhost';
 $dbuser = '21_bryla';
 $dbpass = 'E4p5s4y3e6';
 $dbname = '21_bryla';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: '.mysqli_connect_error());
echo "Połączenie udane <br>";
 ?>