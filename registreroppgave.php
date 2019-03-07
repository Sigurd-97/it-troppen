<?php  /* registrer oppgave */
/*
/*  Programmet lager et html-skjema for å registrere et oppgave
/*  Programmet registrerer data (fagkode, oppgavenr og frist) i databasen
*/
include("sidestart.html");
?> 
<h3>Registrer oppgave </h3>
<form method="post" action="" id="registrerOppgaveSkjema" name="registrerOppgaveSkjema">
Fagkode
   <select name="fagkode" id="fagkode">
  <option value=""> velg fagkode </option>
  <?php include("dynamiskefunksjoner.php") ;listeboksFagkode(); ?>
    </select>
	<br>
Oppgavenr <input type="text" id="oppgavenr" name="oppgavenr" required /> <br/>
Frist <input type="text" id="frist" name="frist" required /> <br/>
<input type="submit" value="Registrer oppgave" id="registrerOppgaveKnapp" name="registrerOppgaveKnapp" /> 
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["registrerOppgaveKnapp"]))
    {
      $fagkode=$_POST ["fagkode"];
      $oppgavenr=$_POST ["oppgavenr"];
      $frist=$_POST ["frist"];
      if (!$fagkode || !$oppgavenr || !$frist)
        {
          print ("Alle felter må fylles ut");
        }
      else
	{
include("db_tilkobling.php");
$sqlSetning="SELECT * FROM oppgave WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);

          if ($antallRader!=0)  /* oppgaven er registrert fra før */
            {
              print ("Oppgaven er registrert fra før");
            }
          else
{
$sqlSetning="INSERT INTO oppgave (fagkode,oppgavenr,frist) VALUES ('$fagkode','$oppgavenr','$frist');";
$sqlResultat=mysqli_query($db,$sqlSetning) or die("Ikke mulig å registrere i database");
              print ("Følgende oppgave er nå registrert: $fagkode og $oppgavenr, med frist $frist"); 
            }
        }
    }

?>
<?php
include("sideslutt.html");
?>