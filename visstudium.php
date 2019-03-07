<?php
include("sidestart.html");
include("db_tilkobling.php");
 ?>

<?php // vis alle studiumnavner //

// Programmet skriver ut alle registrerte studiumnavn //
include("db_tilkobling.php");
	$sqlSetning="SELECT * FROM studium;";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
	
	$antallRader=mysqli_num_rows($sqlResultat);
	
print ("<h3> Registrerte studium </h3>");
print ("<table border=1>");
print ("<tr> <th align=left>studiumkode </th> <th align=left> studiumnavn </th> </tr>");

for ($r=1;$r<=$antallRader;$r++)
{
	$rad=mysqli_fetch_array($sqlResultat);
	$studiumkode=$rad["studiumkode"]; 
		$studiumnavn=$rad["studiumnavn"]; 
		
	print ("<tr> <td> $studiumkode </td> <td> $studiumnavn </td> </tr>");
}
	print ("</table");
?>
