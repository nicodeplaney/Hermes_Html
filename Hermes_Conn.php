<!DOCTYPE html>

<?php

// Verification si l'utilisateur a déjà tenter de saisir un mot de passe

if (!isset($_GET['id']))
{
	$Testuser = '';

}
else {

$Testuser = 'Fin de connexion ou erreur de connexion';	

}

?>

<html>
  <head>
    <meta charset="utf-8">
    <title>HERMES-SERV Acceuil</title>
	
	<!-- CSS 	-->
	
	<link href="styles/StyleLogin.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  </head>
  <body>
  
	<!-- Zone logo -->
  
	<header>
		<img src="/Hermes_php/logo.gif" alt="Logo HubSpot" width=100% height=100% title="Découvrez notre logo !"/>

 	</header>


</div>	

	<!-- Zone insertion -->

	<form action="Hermes_Cook.php" method="POST">
	  <h2>Connexion a la base de donnée</h2>
	  <?php echo $Testuser; ?>
	  <div class="input-container">
		<i class="fa fa-user icon"></i>
		<input class="input-field" type="text" placeholder="Pseudo" id="PseudoLigneUser" name="PseudoLigneUserDsP">
	  </div>

	  <div class="input-container">
		<i class="fa fa-key icon"></i>
		<input class="input-field" type="password" placeholder="Mot de passe" id="PassewordLigneUser" name="PassewordLigneUserDsP">
	  </div>
		

	  <button type="submit" class="btn">Connexion</button>

	</form>


	<!-- fin intro -->


	<script src="scripts/main.js"></script>



</html>