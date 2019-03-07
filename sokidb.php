<?php  /* sok-i-db-med-uthevning-av-flere-treff */
/*
/*    Programmet demonstrerer søk i databasetabeller
*/
/* Programmet endrer den valgte fag
*/
include("sidestart.html")

?> 

<h3>S&oslashk </h3>

<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
    S&oslash;kestreng <input type="text" id="sokestreng" name="sokestreng" required /> <br/>
    <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" /> 
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST ["sokeKnapp"]))
    {
      $sokestreng=$_POST ["sokestreng"];

      include("db_tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

      print ("Treff for s&oslash;kestrengen <strong>$sokestreng</strong> <br /><br />");  
	  
      /* søk i STUDIUM-tabellen*/
	$sqlSetning="SELECT * FROM studium WHERE studiumkode LIKE '%$sokestreng%' OR studiumnavn LIKE '%$sokestreng%';";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i STUDIUM-tabellen: <br /> Ingen <br /> <br />");  
        }
      else 
        {
          print ("Treff i STUDIUM-tabellen: <br />");  
          print ("<table border=1>");  
          print ("<tr><th align=left>studiumkode</th> <th align=left>studiumnavn</th> </tr>");

          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
              $studiumkode=$rad["studiumkode"];     
              $studiumnavn=$rad["studiumnavn"];   
			  
			  print("<tr>  </tr>");
			  
		$tekst=("<td> $studiumkode </td>   <td> $studiumnavn </td> "); 
		 $sokestrenglengde=strlen($sokestreng); // lengden på søkestrengen //
			   $startpos=stripos($tekst,$sokestreng); //angir hvor i teksten søkestrengen starter //
			   
			   while ($startpos!==false){
			   $tekstlengde=strlen($tekst);  // Lengden på tekststrengen //
			    $hode=substr($tekst,0,$startpos);  // hode kommer før søkestrengen i teksten //
			  $sok=substr($tekst,$startpos,$sokestrenglengde); // søkestrengen i teksten//
			  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde); // Hale kommer etter søkestrengen i teksten //
			  
		print("$hode<strong><font color='blue'>$sok</font></strong> </font color>");
		
		$tekst=$hale; // ny tekst=nåværende hale //
		 $startpos=stripos($tekst,$sokestreng);
             }
			}
          print ("$tekst</tr>"); // eller print ("$hale </tr>") fordi de er like //
        }
	

     // søk i FAG-tabellen //
      $sqlSetning="SELECT * FROM fag WHERE fagkode LIKE '%$sokestreng%' OR fagnavn LIKE '%$sokestreng%' OR studiumkode LIKE '%$sokestreng%'";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i FAG-tabellen: <br /> Ingen <br /> <br />");
        }
      else
{
          print ("Treff i FAG-tabellen: <br />");
          print ("<table border=1");
          print ("<tr><th align=left>fagkode</th> <th align=left>fagnavn</th><th align=left>studiumkode</th></tr>");
          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
              $fagkode=$rad["fagkode"];
              $fagnavn=$rad["fagnavn"];
              $studiumkode=$rad["studiumkode"];
              print("<tr>");
        $tekst=("<td> $fagkode </td> - <td> $fagnavn </td> - <td> $studiumkode </td>"); 
         $sokestrenglengde=strlen($sokestreng); // lengden på søkestrengen //
         $startpos=stripos($tekst,$sokestreng); //angir hvor i teksten søkestrengen starter //
		 
         while($startpos!==false)
    {
    $tekstlengde=strlen($tekst);
     $hode=substr($tekst,0,$startpos); //Hode kommer før søkestrengen i teksten //
     $sok=substr($tekst,$startpos,$sokestrenglengde); // Søkestrengen i teksten //
     $hale= substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde); // Hale kommer etter søkestrengen i teksten //
    print("$hode <strong><font color='blue'>$sok</font></strong>");
    $tekst=$hale; // Ny tekst – nåværende hale //
    $startpos=stripos($tekst,$sokestreng);
    }
    print("$tekst</tr>"); // eller print("$hale</tr>"); //
             }
          print ("</table> </br />");
        }
	

// søk i OPPGAVE-tabellen //
      $sqlSetning="SELECT * FROM oppgave WHERE fagkode LIKE '%$sokestreng%' OR oppgavenr LIKE '%$sokestreng%' OR frist LIKE '%$sokestreng%'";
      $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
      $antallRader=mysqli_num_rows($sqlResultat); 

      if ($antallRader==0) 
        {
          print ("Treff i OPPGAVE-tabellen: <br /> Ingen <br /> <br />");
        }
      else
{
          print ("Treff i OPPGAVE-tabellen: <br />");
          print ("<table border=1>");
          print ("<tr><th align=left>fagkode</th> <th align=left>oppgavenr</th><th align=left>frist</th></tr>");
          for ($r=1;$r<=$antallRader;$r++)
            {
              $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
              $fagkode=$rad["fagkode"];
              $oppgavenr=$rad["oppgavenr"];
              $frist=$rad["frist"];
              print("<tr>");
        $tekst=("<td> $fagkode </td>  <td> $oppgavenr </td>  <td> $frist </td>"); 
         $sokestrenglengde=strlen($sokestreng); // lengden på søkestrengen //
         $startpos=stripos($tekst,$sokestreng); //angir hvor i teksten søkestrengen starter //
         while($startpos!==false)
    {
    $tekstlengde=strlen($tekst);
     $hode=substr($tekst,0,$startpos); //Hode kommer før søkestrengen i teksten //
     $sok=substr($tekst,$startpos,$sokestrenglengde); // Søkestrengen i teksten //
     $hale= substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde); // Hale kommer etter søkestrengen i teksten//
    print("$hode <strong><font color='blue'>$sok</font></strong>");
    $tekst=$hale; // Ny tekst – nåværende hale //
    $startpos=stripos($tekst,$sokestreng);
    }
    print("$tekst</tr>"); // eller print("$hale</tr>"); */
             }
          print ("</table> </br />");
        }
	
	
	
	}

?>