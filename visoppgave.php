<?php /* vis alle oppgaver */
/* 
/* Programmet skriver ut alle registrerte oppgaverr
*/
include("sidestart.html");
include("db_tilkobling.php");
$sqlSetning="SELECT * FROM oppgave";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);
print("<h3>Registrerte oppgaver</h3>");
print("<table border=1>");
print("<tr><th align=left>fagkode</th><th align=left>oppgavenr</th><th align=left>frist</th></tr>");
for($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat);
$fagkode=$rad["fagkode"]; /* kan også skrive $fagkode=$rad[0]; */
$oppgavenr=$rad["oppgavenr"]; /* kan også skrive $oppgavenr=$rad[1]; */
$frist=$rad["frist"]; /* kan også skrive $frist=$rad[2]; */
print("<tr><td>$fagkode</td><td>$oppgavenr</td><td>$frist</td></tr>");
}
print("</table>");
include("sideslutt.html");
?>