<?php  /* slett-poststed */
/*
/*  Programmet lager et skjema for å velge et poststed som skal slettes  
/*  Programmet sletter det valgte poststedet
*/
?> 

<?php
include("sidestart.html");
include("db_tilkobling.php");
 ?>
<script src="funksjoner.js"> </script>

<h3>Slett studium</h3>

<form method="post" action="" id="slettstudium" name="slettstudium" onSubmit="return bekreft()">
  Studiumkode
   <select name="studiumkode" id="studiumkode">
  <option value=""> velg studiumkode </option>
  <?php include("dynamiskefunksjoner.php") ;listeboksStudiumkode(); ?>
    </select>
  <input type="submit" value="Slett studium" name="slettstudiumKnapp" id="slettstudiumKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettstudiumKnapp"]))
    {	
      $studiumkode=$_POST ["studiumkode"];
include("db_tilkobling.php");
       $sqlSetning="DELETE FROM studium WHERE studiumkode='$studiumkode';";
			 mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette i database");
      print ("F&oslash;lgende studium er n&aring; slettet: $studiumkode  <br />");
    }
?> 

<?php
include("sideslutt.html");
?>