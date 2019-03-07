<?php  /* endre fag */
/*
/*  Programmet lager et skjema for å velge et fag som skal endres  
/*  Programmet viser fag som er valgt og gir mulighet for endring 
/*  Programmet endrer den valgte fag
*/
include("sidestart.html")
?> 
<h3>Endre fag</h3>
<form method="post" action="" id="finnFagSkjema" name="finnFagSkjema">
Fagkode 
<select name="fagkode" id="fagkode">
<option value=""> Velg fag </option>
<?php include("dynamiskefunksjoner.php");listeboksEndreFagkode();?>
</select>
<br/>
  <input type="submit"  value="Finn fag" name="finnFagKnapp" id="finnFagKnapp"/> 
  <br/>
</form>
<?php
  if (isset($_POST ["finnFagKnapp"]))
    {
      include("db_tilkobling.php");  
      $fagkode=$_POST ["fagkode"];	  
      $sqlSetning="SELECT * FROM fag WHERE fagkode='$fagkode';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra databasen");
      $rad=mysqli_fetch_array($sqlResultat);
      $fagnavn=$rad["fagnavn"];
      $studiumkode=$rad["studiumkode"];
print("<form method='post' action=''>");
print("Fagkode <input type='text' value='$fagkode' name='fagkode' id='fagkode' readonly/><br/>");
print("Fagnavn <input type='text' value='$fagnavn' name='fagnavn' id='fagnavn' required/><br/>");
print("Studiumkode <select name='studiumkode' id='studiumkode'>");listeboksStudiumkodeValgt($studiumkode);print("</select><br/>");
print("<input type='submit' value='Endre fag' name='endreFagKnapp' id='endreFagKnapp'<br/>");
print("</form>");
    }
if (isset($_POST ["endreFagKnapp"]))
    { 
      $fagkode=$_POST ["fagkode"];
      $fagnavn=$_POST ["fagnavn"];
      $studiumkode=$_POST ["studiumkode"];
     if (!$fagkode || !$fagnavn || !$studiumkode)
        {
          print ("Alle felt m&aring; fylles ut");
        }
      else
        {
          include("db_tilkobling.php");   
          $sqlSetning="UPDATE fag SET fagnavn='$fagnavn', studiumkode='$studiumkode' WHERE fagkode='$fagkode';";
          mysqli_query($db,$sqlSetning) or die("Ikke mulig å endre i databasen");
          print ("Faget med fagkode $fagkode er n&aring; endret<br />");
        }
    }
include("sideslutt.html")
?>