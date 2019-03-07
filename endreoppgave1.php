<?php  /* endre studium */
/*
/*  Programmet lager et skjema for å velge en studium som skal endres  
/*  Programmet viser studiumet som er valgt og gir mulighet for endring 
/*  Programmet endrer den valgte studium
*/
include("sidestart.html")
?> 
<h3>Endre oppgave</h3>
<form method="post" action="" id="finnOppgaveSkjema" name="finnOppgaveSkjema">
Oppgave 
<select name="fagkodeoppgavenr" id="fagkodeoppgavenr">
<option value=""> Velg oppgave </option>
<?php include("dynamiskefunksjoner.php");listeboksEndreOppgavenr();?>
</select>
<br/>
  <input type="submit"  value="Finn oppgave" name="finnOppgaveKnapp" id="finnOppgaveKnapp"/> 
  <br/>
</form>
<?php
  if (isset($_POST ["finnOppgaveKnapp"]))
    {
      include("db_tilkobling.php");  
      $fagkodeoppgavenr=$_POST ["fagkodeoppgavenr"];	
      $del=explode(" ",$fagkodeoppgavenr);
      $fagkode=$del[0];
      $oppgavenr=$del[1]; 
      $sqlSetning="SELECT * FROM oppgave WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra databasen");
      $rad=mysqli_fetch_array($sqlResultat);
      $frist=$rad["frist"];
print("<form method='post' action='' id='endreOppgaveSkjema' name='endreOppgaveSkjema'>");
print("Fagkode <input type='text' value='$fagkode' name='fagkode' id='fagkode' readonly/><br/>");
print("Oppgavenr <input type='text' value='$oppgavenr' name='oppgavenr' id='oppgavenr' readonly/><br/>");
print("Frist <input type='text' value='$frist' name='frist' id='frist' required/><br/>");
print("<input type='submit' value='Endre oppgave' name='endreOppgaveKnapp' id='endreOppgaveKnapp'<br/>");
print("</form>");
    }
if (isset($_POST ["endreOppgaveKnapp"]))
    {
      include("db_tilkobling.php");  
      $fagkode=$_POST ["fagkode"];
      $oppgavenr=$_POST ["oppgavenr"];
      $frist=$_POST ["frist"];
     if (!$fagkode || !$oppgavenr || !$frist)
        {
          print ("Alle felt m&aring; fylles ut");
        }
      else
        {
          $sqlSetning="UPDATE oppgave SET frist='$frist' WHERE fagkode='$fagkode' AND oppgavenr='$oppgavenr';";
          mysqli_query($db,$sqlSetning) or die("Ikke mulig å endre i databasen");
          print ("Oppgaven med fagkode $fagkode og oppgavenr  $oppgavenr er n&aring; endret<br />");
        }
    }
include("sideslutt.html")
?>