<!DOCTYPE html>
<!--
[P] Vérification mot de passe [Bloc obligatoire] // 
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





<html>
  <head>
      <meta charset="utf-8">
    <title>HERMES-SERV Acceuil</title>
	
	<!-- CSS -->
	
	<link href="styles/StylePage.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
  </head>
  <body>
  
<header>

 </header>

<table id="myTable">



	<!-- Zone logo -->

	<tr class="header">
		<th style="width:200px;"><img src="/Hermes/logo.gif" alt="Logo HubSpot" width=100% height=100% title="Découvrez notre logo !"/></th>
		<th style="width:50;">
		Bonjour 
		<?php echo $PseudoFormCokDte ?>
		</th>
		<th style="width:5%;"></th>
	</tr>
	
	<!-- Zone Boutton -->
	
	<tr>
		<th></th>
		<th>
			<?php echo 'Test value' ?>
		</th>
		<th></th>
	</tr>
	
	<tr style="height:800px;">
		<th></th>
		<th align= "left" VALIGN="TOP">
			<table id="myTable">
				<tr class="header">
				<?php
				
				$dbname = 'mysql_dbname';

				if (!mysql_connect('mysql_host', 'mysql_user', 'mysql_password')) {
				   echo 'Impossible de se connecter à MySQL';
				   exit;
				}

				$sql = "SHOW TABLES FROM $dbname";
				$result = mysql_query($sql);

				if (!$result) {
				   echo "Erreur DB, impossible de lister les tables\n";
				   echo 'Erreur MySQL : ' . mysql_error();
				   exit;
				}

				while ($row = mysql_fetch_row($result)) {
				   echo "Table : {$row[0]}\n";
				}

				mysql_free_result($result);
				?>
				
			</tr>		
			</table>
			
		</th>
		<th align= "left" VALIGN="TOP"><button type="btn" onclick="location.href=''">[+]</button></th>
	</tr>
</table>	

<?php
 // header('Location: /Hermes_php/P1/P1_1_2.php'); // Retour page original
 // exit();
?>

	<!-- Script Jscript -->
	
	<script src="scripts/Menu.js"></script>
 
</div>