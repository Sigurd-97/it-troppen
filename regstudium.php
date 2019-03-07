
<?php
include("sidestart.html");
include("db_tilkobling.php");
 ?>

	<h1>STUDIUM</h1>




<form method="POST" action="" id="" name="" >
  Studiumkode <input type="text" id="studiumkode" name="studiumkode"  required /> <br />
  studiumnavn <input type="text" id="studiumnavn" name="studiumnavn"  required/>  <br />
  <input type="submit" value="Registrer poststed" id="registrerstudiumknapp" name="registrerstudiumknapp" />
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>



<?php
if (isset($_POST ["registrerstudiumknapp"]))
{
$studiumkode=$_POST["studiumkode"];
$studiumnavn=$_POST["studiumnavn"];

if (!$studiumkode || !$studiumnavn)
{
  print ("Du må fylle begge feltene.");
}
      else
        {
			include("db_tilkobling.php");
			$sqlSetning="SELECT * FROM studium WHERE studiumkode='$studiumkode';";
	$sqlResultat=mysqli_query($db,$sqlSetning) or die ("<br>ikke mulig å hente fra database");
			$antallRader=mysqli_num_rows($sqlResultat);
			
          if ($antallrader!=0)  /* poststedet er registrert fra før */
            {
              print ("studiumnavn er registrert fra f&oslashr");
            }
          else
            {
			  $sqlSetning="INSERT INTO studium VALUES('$studiumkode','$studiumnavn');";
			  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å registrere i database");
              print ("F&oslash;lgende studiumkode er n&aring; registrert: $studiumkode $studiumnavn"); 
            }
        }
    }
?> 