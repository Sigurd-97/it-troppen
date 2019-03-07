<?php  /* slett oppgave */
/*
/*  Programmet lager et skjema for å velge en oppgave som skal slettes  
/*  Programmet sletter den valgte oppgave
*/
include("sidestart.html")
?> 
<script src="funksjoner.js"> </script>
<h3>Slett oppgave</h3>
<form method="post" action="" id="slettOppgaveSkjema" name="slettOppgaveSkjema" onSubmit="return bekreft()">
Oppgave 
<select name="oppgave" id="oppgave">
<option value=""> Velg oppgave </option>
<?php include("dynamiskefunksjoner.php") ;listeboksFagkodeOppgavenr(); ?>
</select>

<input type="submit" value="Slett oppgave" name="slettOppgaveKnapp" id="slettOppgaveKnapp" /> 
</form>
<?php
  if (isset($_POST ["slettOppgaveKnapp"]))
    {
    include("db_tilkobling.php");	
      $fagkode=$_POST ["fagkode"];
      $oppgavenr=$_POST ["oppgavenr"];
    $sqlSetning="DELETE FROM oppgave WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
    mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
      print ("Følgende oppgave er nå slettet: $fagkode, med oppgavenummer $oppgavenr <br />");
    }
include("sideslutt.html");
?>