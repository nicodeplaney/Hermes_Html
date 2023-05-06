<!DOCTYPE html>
<!--
[P] Vérification mot de passe [Bloc obligatoire]
-->
<?php
	// Completion 
	if (isset($_COOKIE['cookie'])) {
		foreach ($_COOKIE['cookie'] as $name => $value) {
			$ValuecookieDta[] = $value;
		}
	}
	// Definition valleur cookie en Dte
	$PseudoFormCokDte = $ValuecookieDta[0];
	$PassewordFormCokDte = $ValuecookieDta[1];
	// Connexion a la base SQL
	try
	{
		
		$mysqlClient = new PDO('mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root'); // Adresse de la base de donnée
	}
	catch(Exception $e)
	{
		// Message Erreur
			die('Erreur : '.$e->getMessage());
	}
	// Réquete SQL
	$masterbaseuserSql = 'SELECT * FROM masterbaseuser';
	$masterbaseuserSta = $mysqlClient->prepare($masterbaseuserSql);
	$masterbaseuserSta->execute();
	$masterbaseuserLt1 = $masterbaseuserSta->fetchAll();
	// Mettre tout dans un array
	foreach ($masterbaseuserLt1 as $masterbaseuserLt2) {

		$PseudoLigneUserDta[] = $masterbaseuserLt2['Collum_5']; 
		$PassewordLigneUserDta[] = $masterbaseuserLt2['Collum_4'];
		
	}
	// Mise a zero test connexion
	$PseudoLigneUserDyn = false; 
	$PassewordLigneUserDyn = false;
	// vérification pseudo
	if (in_array($PseudoFormCokDte, $PseudoLigneUserDta, true)) {
		$PseudoLigneUserDyn = true; 
	}
	// vérification mot de passe 
	if (in_array($PassewordFormCokDte, $PassewordLigneUserDta, true)) {
		$PassewordLigneUserDyn = true;
	}
	// vérification connexion
	if (($PseudoLigneUserDyn == true) || ($PassewordLigneUserDyn == true)) {
		//echo 'Test conforme'; // Accée autorisé
	}
	else {
		
		// Reset Cookie de connexion 
		setcookie("cookie[Pseudo]", $PseudoFormCokDeP, time() - 3600);
		setcookie("cookie[Passeword]", $PassewordFormCokDeP, time() - 3600);
		setcookie("cookie[Serveur]", "cookieone", time() - 3600);
		
		// Retour page de connexion
		
		header('Location: /Hermes/Hermes_Conn.php?id=23'); // accée refusée retour a la page de connexion
		exit();
		
	}

?>
<!--
[P] Recuperer processus
-->



<!--
[D] 
-->

<!--
[D] 
-->

<!--
[C] 
-->

<html>
  <head>
    <meta charset="utf-8">
    <title>HERMES-SERV Acceuil</title>
	
	<!-- CSS -->
	
	<link href="styles/StyleMenu.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	
  </head>
  <body>
  
	<!-- Zone logo -->
  
<header>
		
		<!-- Logo Hermes -->
		<img src="/Hermes_php/logo.gif" alt="Logo HubSpot" width=100% height=100% title="Découvrez notre logo !"/>
		
		<!-- Logo du menu -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Entete du menu -->
		<div class="topnav">
		  <a href="" class="active">Hermes</a>
		  <!-- Menu -->
		  <div id="myLinks">
		  
			<?php
			
			// Definition

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P1", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P1.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Planification

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P2", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P2.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
		  
		  
			<?php
			
			// Ged

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P3", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P3.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Mise en oeuvre

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P4", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P4.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Vérification

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P5", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P5.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
		  
			<?php
			
			// Amélioration

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id AND Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['id' => "P6", 'Type' => "1"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P6.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
		  
			<a href="/Hermes/Hermes_AddTable.php"><img src="/Hermes/images/page.png" alt="Page" width=28 height=20 title=3" !"/>Table</a>

		  </div>
		  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		  </a>
		</div>
		
	<ul class="breadcrumb">
	  <li><img src="/Hermes/images/Home.png" alt="Page" width=28 height=20 title=3" !"/>Home</li>

 </header>


<?php
 // header('Location: /Hermes_php/P1/P1_1_2.php'); // Retour page original
 // exit();
?>

	<!-- Script Jscript -->
	
	<script src="scripts/Menu.js"></script>
 
</div>