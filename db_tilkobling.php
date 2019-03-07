<?php   // DB tilkobling //

// Programmet foretar tilkobling til database-server og valg av database
$host="localhost";
$user="224923";
$password="f4OlKmoL"; // mysql passordet //
$database="224923";

	$db=mysqli_connect($host,$user,$password,$database) or die ("ikke kontakt med db-server");
print ("tilkobling funka <br>")
?>