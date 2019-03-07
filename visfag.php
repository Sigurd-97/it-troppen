<?php /* vis alle fag */
/* 
/* Programmet skriver ut alle registrerte fag
*/
include("sidestart.html");
include("db_tilkobling.php");
$sqlSetning="SELECT * FROM fag";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);
print("<h3>Registrerte fag</h3>");
print("<table border=1>");
print("<tr><th align=left>fagkode</th><th align=left>fagnavn</th><th align=left>studiumkode</th></tr>");
for($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat);
$fagkode=$rad["fagkode"]; /* kan også skrive $fagkode=$rad[0]; */
$fagnavn=$rad["fagnavn"]; /* kan også skrive $fagnavn=$rad[1]; */
$studiumkode=$rad["studiumkode"]; /* kan også skrive $studiumkode=$rad[2]; */
print("<tr><td>$fagkode</td><td>$fagnavn</td><td>$studiumkode</td></tr>");
}
print("</table>");
include("sideslutt.html");
?>