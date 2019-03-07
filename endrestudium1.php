<?php  /* endre-ansatt */
/*
/*  Programmet lager et skjema for å velge en ansatt som skal endres  
/*  Programmet viser ansatt som er valgt og gir mulighet for endring 
/*  Programmet endrer den valgte ansatte
*/
include("sidestart.html")
?> 

<h3>Endre studium</h3>

<form method="post" action="" id="finnStudiumSkjema" name="finnStudiumSkjema">
  Studiumkode
<select name="studiumkode" id="studiumkode">
<option value=""> Velg studium </option>
<?php include ("dynamiskefunksjoner.php"); listeboksendreStudiumkode (); ?>

</select>
  <input type="submit"  value="Finn studium" name="finnStudiumKnapp" id="finnStudiumKnapp"> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
  if (isset($_POST ["finnStudiumKnapp"]))
	  
    {
		include("db_tilkobling.php");
      $studiumkode=$_POST ["studiumkode"];
	  $sqlSetning="SELECT * FROM studium WHERE studiumkode='$studiumkode';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra databasen");
	$rad=mysqli_fetch_array($sqlResultat);	  
	$studiumkode=$rad["studiumkode"];
	$studiumnavn=$rad["studiumnavn"];
	
	
	print ("<form method='post' action=''>");
	print("studiumkode <input type='text' value='$studiumkode' name='studiumkode' id='studiumkode' readonly /> <br />");
    print("Studiumnavn <input type='text' value='$studiumnavn' name='studiumnavn' id='studiumnavn' required/><br/>");

	print("<input type='submit' value='Endre studium' name='endreStudiumKnapp' id='endreStudiumKnapp'>");
	print("</form>");
	}
	

if (isset($_POST ["endreStudiumKnapp"]))
    {
		include("db_tilkobling.php");
      $studiumkode=$_POST ["studiumkode"];
      $studiumnavn=$_POST ["studiumnavn"];
      
     if (!$studiumkode || !$studiumnavn )
        {
          print ("Alle felt m&aring; fylles ut");
        }
      else
        {
			$sqlSetning="UPDATE studium SET studiumnavn='$studiumnavn' WHERE studiumkode='$studiumkode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å endre i database");
		  print ("Studie med studiumkode; $studimkode er n&aring; endret<br />");
        }
    }
?> 

<?php
include("sideslutt.html")
?>

