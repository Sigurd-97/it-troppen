<?php
include("sidestart.html");

 ?>
<form method="post" action="" id="registrerFagSkjema" name="registrerFagSkjema">
  Fagkode <input type="text" id="fagkode" name="fagkode" required /> <br/>
  Fagnavn <input type="text" id="fagnavn" name="fagnavn" required /> <br/>
  Studiumkode
   <select name="studiumkode" id="studiumkode">
  <option value=""> velg studiumkode </option>
  <?php include("dynamiskefunksjoner.php") ;listeboksStudiumkode(); ?>
    </select>
  <input type="submit" value="Registrer fag" id="registrerFagKnapp" name="registrerFagKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["registrerFagKnapp"]))
    {
      $fagkode=$_POST ["fagkode"];
      $fagnavn=$_POST ["fagnavn"];
	    $studiumkode=$_POST ["studiumkode"];

      if (!$fagkode || !$fagnavn || !$studiumkode)
        {
          print ("B&aring;de fagkode,fagnavn og studiumkode m&aring; fylles ut");

        }
      else
        {
			include("db_tilkobling.php");
			$sqlSetning="SELECT * FROM fag WHERE fagkode='$fagkode';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);
			
          if ($antallrader!=0)  /* fagnavnet er registrert fra før */
            {
              print ("fagnavnet er registrert fra f&oslashr");
            }
          else
            {
			  $sqlSetning="INSERT INTO fag(fagkode,fagnavn,studiumkode) VALUES('$fagkode','$fagnavn', '$studiumkode');";
			  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database");
              print ("F&oslash;lgende fagnavn er n&aring; registrert: $fagkode $fagnavn"); 
            }
        }
    }
?> 

<?php
include("sideslutt.html");

 ?>