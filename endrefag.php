<?php  /* endre fag */
/*
/*  Programmet lager et skjema for å velge et fag som skal endres  
/*  Programmet endrer det valgte faget
*/
include("sidestart.html")
?> 

<h3>Endre fag</h3>

<form method="post" action="" id="finnFagSkjema" name="finnFagSkjema">
Fagkode
   <select name="fagkode" id="fagkode">
  <option value=""> velg fagkode </option>
  <?php include("dynamiskefunksjoner.php") ;listeboksFagkode(); ?>
    </select>
	<br>
Fagnavn (ny verdi)<input type="text" id="fagnavn" name="fagnavn" required /> <br/>
Studiumkode (ny verdi)<input type="text" id="studiumkode" name="studiumkode" required /> <br/>
  <input type="submit"  value="Endre fag" name="endreFagKnapp" id="endreFagKnapp"> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
  if (isset($_POST ["endreFagKnapp"]))
    {
      $fagkode=$_POST ["fagkode"];
      $fagnavn=$_POST ["fagnavn"];  
      $studiumkode=$_POST ["studiumkode"];	
      if (!$fagkode || !$fagnavn || !$studiumkode)
        {
          print ("Alle felter må fylles ut");    /* melding skrevet */
        }
      else
        {
include("db_tilkobling.php");
$sqlSetning="UPDATE fag SET fagnavn='$fagnavn', studiumkode='$studiumkode' WHERE fagkode='$fagkode';";
mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
          print ("Faget med fagkode $fagkode er nå endret<br />");
        } 
    }
include("sideslutt.html")
?>