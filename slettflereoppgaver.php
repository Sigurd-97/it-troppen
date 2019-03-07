<?php  /* slett-flere-poststeder */
/*
/*  Programmet lager et skjema for å velge flere poststeder som skal slettes  
/*  Programmet sletter de valgte poststedene
*/
include("sidestart.html")
?> 

<script src="funksjoner.js"> </script>

<h3>Slett oppgaver</h3>

<form method="post" action="" id="slettOppgaveSkjema" name="slettOppgaveSkjema" onSubmit="return bekreft()">
  Oppgave <br />
  <?php include ("dynamiskefunksjoner.php"); sjekkbokseroppgavenr(); ?>
  <input type="submit" value="Slett oppgave" name="slettOppgaveKnapp" id="slettOppgaveKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettOppgaveKnapp"]))
    {
      $oppgavenr=$_POST ["oppgavenr"];
      $antall=count($oppgavenr);

      if ($antall==0)
        {
          print ("Ingen oppgavenr ble valgt <br />");
        }
      else
        {
		for ($r=0;$r<$antall;$r++)
		{
			$sqlSetning="DELETE FROM oppgave WHERE oppgavenr='$oppgavenr[$r]';";
			mysqli_query($db,$sqlSetning) or die ("Ikke mulig å slette i database");
        }			
          print ("De valgte oppgavene er n&aring; slettet <br />");     
        }
    }

?> 
<?php
include("sideslutt.html")
?>