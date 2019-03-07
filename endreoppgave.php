<?php  /* endre studium */
/*
/*  Programmet lager et skjema for å velge en oppgave som skal endres  
/*  Programmet endrer den valgte oppgaven
*/
include("sidestart.html")
?> 

<h3>Endre oppgave</h3>

<form method="post" action="" id="endreOppgaveSkjema" name="endreOppgaveSkjema">
Oppgave 
<select name="oppgave" id="oppgave">
<option value=""> Velg oppgave </option>
<?php include("dynamiskefunksjoner.php") ;listeboksFagkodeOppgavenr(); ?>
</select>
  <br/>
Frist (ny verdi)<input type="text" id="frist" name="frist" required /> <br/>
  <input type="submit"  value="Endre oppgave" name="endreOppgaveKnapp" id="endreOppgaveKnapp"> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
  if (isset($_POST ["endreOppgaveKnapp"]))
    {
		
      $fagkode=$_POST ["fagkode"];
      $oppgavenr=$_POST ["oppgavenr"];
      $frist=$_POST ["frist"];  /* variabler gitt verdier fra feltene i HTML-skjemaet */	
      if (!$fagkode || !$oppgavenr || !$frist)
        {
          print ("Alle felter må fylles ut");    /* melding skrevet */
        }
      else
        {
include("db_tilkobling.php");
$sqlSetning="UPDATE oppgave SET frist='$frist' WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
          print ("Oppgaven med fagkode $fagkode og oppgavenummer $oppgavenr er nå endret<br />");
        } 
    }

?>
<?php
include("sideslutt.html")
?>