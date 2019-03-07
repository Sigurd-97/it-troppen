<?php /* vis alle fag */
/* 
/* Programmet skriver ut alle registrerte fag
*/
include("sidestart.html");
include("db_tilkobling.php");
$sqlSetning="SELECT * FROM student";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);
print("<h3>Registrerte studenter</h3>");
print("<table border=1>");
print("<tr><th align=left>Fornavn</th><th align=left>Etternavn</th><th align=left>Brukernavn</th></tr><th align=left>Klassekode</th>");
for($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat);
$fornavn=$rad["fornavn"]; /* kan også skrive $fagkode=$rad[0]; */
$etternavn=$rad["etternavn"]; /* kan også skrive $fagnavn=$rad[1]; */
$brukernavn=$rad["brukernavn"]; /* kan også skrive $studiumkode=$rad[2]; */
$klassekode=$rad["klassekode"]; /* kan også skrive $studiumkode=$rad[2]; */
print("<tr><td>$fornavn</td><td>$etternavn</td><td>$brukernavn</td><td>$klassekode</td></tr>");
}
print("</table>");
include("sideslutt.html");
?>