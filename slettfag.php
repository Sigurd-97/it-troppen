<?php  /* slett fag */
/*
/*  Programmet lager et skjema for å velge et fag som skal slettes  
/*  Programmet sletter det valgte faget
*/
include("sidestart.html")
?> 
<script src="funksjoner.js"> </script>
<h3>Slett fag</h3>
<form method="post" action="" id="slettFagSkjema" name="slettFagSkjema" onSubmit="return bekreft()">
  Fagkode <input type="text" id="fagkode" name="fagkode" required /> <br/>
  <input type="submit" value="Slett fag" name="slettFagKnapp" id="slettFagKnapp" /> 
</form>
<?php
  if (isset($_POST ["slettFagKnapp"]))
    {	
      $fagkode=$_POST ["fagkode"];
include("db_tilkobling.php");
$sqlSetning="DELETE FROM fag WHERE fagkode='$fagkode';";
mysqli_query($db,$sqlSetning) or die("Ikke mulig å hente fra database");
      print ("Følgende fag er nå slettet: $fagkode <br />");
    }
include("sideslutt.html");
?>