<?php  /* endre-studium */
/*
/*  Programmet lager et skjema for å velge et studium som skal endres  
/*  Programmet endrer det valgte studiumet
*/

include("sidestart.html");
include("db_tilkobling.php");
 
?> 

<h3>Endre studium</h3>

<form method="post" action="" id="finnstudiumSkjema" name="finnstudiumSkjema">
  Studiumkode
   <select name="studiumkode" id="studiumkode">
  <option value=""> velg studiumkode </option>
  <?php include("dynamiskefunksjoner.php") ;listeboksStudiumkode(); ?>
    </select>
  studium (ny verdi)<input type="text" id="studium" name="studium" required /> <br/>
  <input type="submit"  value="Endre studium" name="endrestudiumKnapp" id="endrestudiumKnapp"> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
  if (isset($_POST ["endrestudiumKnapp"]))
    {
      $studiumkode=$_POST ["studiumkode"];
      $studium=$_POST ["studium"];  /* variable gitt verdier fra feltene i HTML-skjemaet */
	
      if (!$studiumkode || !$studium)
        {
          print ("B&aring;de studiumkode og studium m&aring; fylles ut");    /* melding skrevet */

        }
      else
        {
			include("db_tilkobling.php");
			 $sqlSetning="UPDATE studium SET studiumnavn='$studium' WHERE studiumkode='$studiumkode';";
			 mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre i database");
          print ("studiumet med studiumkode $studiumkode er n&aring; endret<br />");
        } 
    }
	
?> 
<?php
include("sideslutt.html");
?>
