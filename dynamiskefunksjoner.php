<?php   /*  dynamiske funksjoner */

function listeboksStudiumkode()
{
        include ("db_tilkobling.php");
        $sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra database");
        $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); // henter ny rad fra spørringsresultatet //
        $studiumkode=$rad["studiumkode"];
        print("<option value ='$studiumkode'> $studiumkode</option>");
    }
}


function listeboksFagkode()
{
        include ("db_tilkobling.php");
        $sqlSetning="SELECT * FROM fag ORDER BY fagkode;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra database");
        $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); // henter ny rad fra spørringsresultatet //
        $fagkode=$rad["fagkode"];
        print("<option value ='$fagkode'> $fagkode</option>");
    }
}


function listeboksFagkodeOppgavenr()
{
include ("db_tilkobling.php");
        $sqlSetning="SELECT * FROM oppgave ORDER BY fagkode;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra database");
        $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); // henter ny rad fra spørringsresultatet //
        $fagkode=$rad["fagkode"];
        $oppgavenr=$rad["oppgavenr"];
        print("<option value ='$fagkode;$oppgavenr'> $fagkode $oppgavenr</option>");
    }
  for ($r=1;$r<=$antallRader;$r++)
    {

    }
}

function sjekkboksOppgaver()
{
  include("db_tilkobling.php");  /* db_tilkobling til database-server og valg av database utført */
  $sqlSetning="SELECT * FROM oppgave ORDER BY oppgavenr;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */
  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $oppgavenr=$rad["oppgavenr"]; 
      $fagkode=$rad["fagkode"];
      print("<input type='checkbox' id='oppgavenr' name='oppgavenr[]' value='oppgavenr'/>$oppgavenr $fagkode<br/>");  /* ny verdi i sjekkboks laget */
    }
}

function listeboksEndreStudiumkode()
{
  include("db_tilkobling.php");  /* db_tilkobling til database-server og valg av database utført */  
  $sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */
  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $studiumkode=$rad["studiumkode"]; 
      $studiumnavn=$rad["studiumnavn"];
      print("<option value='$studiumkode'>$studiumkode $studiumnavn </option>");  /* ny verdi i listeboksen laget */
    }
}

function listeboksEndreFagkode()
{
  include("db_tilkobling.php");  /* db_tilkobling til database-server og valg av database utført */  
  $sqlSetning="SELECT * FROM fag ORDER BY fagkode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */
  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $fagkode=$rad["fagkode"]; 
      $fagnavn=$rad["fagnavn"];
      print("<option value='$fagkode'>$fagkode $fagnavn </option>");  /* ny verdi i listeboksen laget */
    }
}

function listeboksStudiumkodeValgt($valgtStudiumkode)
{
  include("db_tilkobling.php");
  $sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
  $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
    $studiumkode=$rad["studiumkode"]; 
    $studiumnavn=$rad["studiumnavn"];
    if($studiumkode==$valgtStudiumkode)
    {
      print("<option value='$studiumkode' selected>$studiumkode $studiumnavn</option>");
    }
    else
    {
      print("<option value='$studiumkode'>$studiumkode $studiumnavn</option>");
    }
  }
}

function listeboksEndreOppgavenr()
{
  include("db_tilkobling.php");
  $sqlSetning="SELECT * FROM oppgave ORDER BY fagkode, oppgavenr;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
  $antallRader=mysqli_num_rows($sqlResultat);
  for ($r=1;$r<=$antallRader;$r++)
  {
    $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
    $fagkode=$rad["fagkode"]; 
    $oppgavenr=$rad["oppgavenr"];
    print("<option value='$fagkode $oppgavenr'>$fagkode $oppgavenr</option>");
  }
}
?>