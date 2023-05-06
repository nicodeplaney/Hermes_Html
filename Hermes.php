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
[P] Donnée de connexion
http://localhost/Hermes/Hermes_AddModu.php?ChapLigneBaseModuDsP=jkloij&ProcessLigneBaseModuDsP=23
$IdPage
- Page Home = "rien"
- Page Liste table = ?IdPage=1


-->

<?php

	// Choix menu

	if (!isset($_GET['IdPage']))
		{
			$TypeMenu = "0";
		}
	else{
			
			$TypeMenu = $_GET['IdPage'];
	
		}
		
	if (!isset($_GET['IdTable']))
		{
			$TableSql = "0";
		}
	else{
			
			$TableSql = $_GET['IdTable'];
	
		}

	//echo $TypeMenu;
	//echo $TableSql;
	
	// Id table
	
	
	//$TypeMenu = "4";
	
	
	switch ($TypeMenu) // on indique sur quelle variable on travaille
	{ 
		case 0: // Page acceil

		$NomPage = 'Acceuil';
		$Bt1 = '-';
		$Bt2 = '-';
		$Bt3 = '-';
		$Bt4 = '-';
		
		$LinkBt1 = '-';
		$LinkBt2 = '-';
		$LinkBt3 = '-';
		$LinkBt4 = '-';
		
		break;
		
		case 1: // Page processus

		$NomPage = '';
		$Bt1 = '-';
		$Bt2 = '-';
		$Bt3 = '-';
		$Bt4 = '-';
		
		$LinkBt1 = '-';
		$LinkBt2 = '-';
		$LinkBt3 = '-';
		$LinkBt4 = '-';
		
		break;

		case 2: 

		$NomPage = '';
		$Bt1 = '-';
		$Bt2 = '-';
		$Bt3 = '-';
		$Bt4 = '-';
		
		$LinkBt1 = '-';
		$LinkBt2 = '-';
		$LinkBt3 = '-';
		$LinkBt4 = '-';
		
		break;

		case 3: 

		$NomPage = '';
		$Bt1 = '-';
		$Bt2 = '-';
		$Bt3 = '-';
		$Bt4 = '-';
		
		$LinkBt1 = '-';
		$LinkBt2 = '-';
		$LinkBt3 = '-';
		$LinkBt4 = '-';
		
		break;
	
		case 4: // Page liste table

		$NomPage = 'Liste des tables';
		$Bt1 = 'Ajouter table';
		$Bt2 = '-';
		$Bt3 = '-';
		$Bt4 = '-';
		
		$LinkBt1 = '/Hermes/Hermes_AddTable.php?IdPage=4';
		$LinkBt2 = '-';
		$LinkBt3 = '-';
		$LinkBt4 = '-';
		
		break;

		case 5: // Page tableau table

		$NomPage = str_replace('_', ' ', $TableSql);
		$Bt1 = 'Modification nom table';
		$Bt2 = 'Ajouter ligne';
		$Bt3 = 'Imprimer';
		$Bt4 = 'Home';
		$Bt5 = 'Suppression table';
		
		$LinkBt1 = '-';
		$LinkBt2 = "/Hermes/Hermes_InsrtColTable.php?IdTable={$TableSql}";
		$LinkBt3 = '-';
		$LinkBt4 = '/Hermes/Hermes.php?IdPage=4';
		$LinkBt5 = '-';
		
		break;
					
		default:

	}	
	
?>

<html>
  <head>
      <meta charset="utf-8">
    <title>HERMES-SERV Acceuil</title>
	
	<!-- CSS -->
	
	<link href="styles/StyleHermes.css" rel="stylesheet" type="text/css">
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
			

			<?php 
				switch ($TypeMenu) // on indique sur quelle variable on travaille
				{ 
					case 0: // Page acceil

										
					break;
					
					case 1: // Page processus

					
					break;

					case 2: 

					
					break;

					case 3: 


					
					break;
				
					case 4: // Page liste table

					?>
						<input style="width:100%;" type="text" readonly="readonly" value="<?php echo $NomPage ?>" id="ChapLigneBaseProcess" name="NomTable"> 
					
						<button
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt1 ?>'">
							<?php echo $Bt1 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt2 ?>'">
							<?php echo $Bt2 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt3 ?>'">
							<?php echo $Bt3 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt4 ?>'">
							<?php echo $Bt4 ?>
						</button>

					<?php

					
					break;

					case 5: // Page tableau table

					?>
						<form action="Hermes_ModifNomTable.php?IdTable=<?php echo $NomPage?>" method="POST">
						<input style="width:50%;" type="text" value="<?php echo $NomPage ?>" id="ChapLigneBaseProcess" name="IdModifTable"> 
						
						<button
							style="width:40%" 
							type="Submit">
							<img src="images/pencil.png" alt="Modification" style="width:13px;height:13px">
							<?php echo $Bt1 ?>
						</button></form>
						
						<br>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt5 ?>'">
							<img src="images/trash.png" alt="Modification" style="width:13px;height:13px">
							<?php echo $Bt5 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt2 ?>'">
							<img src="images/plus.png" alt="Modification" style="width:13px;height:13px">
							<?php echo $Bt2 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt3 ?>'">
							<img src="images/print.png" alt="Modification" style="width:13px;height:13px">
							<?php echo $Bt3 ?>
						</button>
						
						<button 
							style="width:24%" 
							type="btn" 
							onclick="location.href='<?php echo $LinkBt4 ?>'">
							<img src="images/HOME.png" alt="Modification" style="width:13px;height:13px">
							<?php echo $Bt4 ?>
						</button>

					<?php
					
					break;
								
					default:

				}	
				
			?>
		
		</th>
		<th></th>
	</tr>
		
	<tr style="height:800px;">
		<th align= "left" VALIGN="TOP">
		<button type="btn" style="width:100%" onclick="location.href='/Hermes/Hermes.php?IdPage=0'"><img src="images/Home.png" alt="Modification" style="width:13px;height:13px"> Acceuil</button>
		<button type="btn" style="width:100%" onclick="location.href='/Hermes/Hermes.php?IdPage=4'"><img src="images/folder.png" alt="Modification" style="width:13px;height:13px"> Table HERMES</button></th>
		
		</th>
		<th align= "left" VALIGN="TOP">
			<table id="myTable">
				<tr class="header">
				
				<?php
				
				switch ($TypeMenu) // on indique sur quelle variable on travaille
				{ 
					case 0: // Page acceil
						
						// Verification si la table processus existe
						
						$bdd = new PDO('mysql:mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root');
						
						$query = $bdd->prepare('show tables'); // Liste des table SQL
						$query->execute();
						
						$VerifTableProcess = true; // Condition
						
						while($rows = $query->fetch(PDO::FETCH_ASSOC)){ // Boucle sur les tables
							
							If ($rows['Tables_in_hermes'] == 'mastertableprocess') {
							
								$VerifTableProcess = false; // Si la table existe 'False'												
								
							}

						}
						
						If ($VerifTableProcess == true){ // Si la table n'xiste pas alors création
														
							$servname = 'localhost';
							$dbname = 'hermes';
							$user = 'root';
							$pass = 'root';
								
							try{
									$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
									$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "CREATE TABLE MastertableProcess(
											Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
											CHAP VARCHAR(256) NOT NULL,
											NOM VARCHAR(256) NOT NULL,
											ICONE VARCHAR(256) NOT NULL
											)";
									
									$dbco->exec($sql);
									
								}
								
								catch(PDOException $e){
									echo "Erreur : " . $e->getMessage();
								}
							
											
						}
						else {
							
							//echo 'test';
							
							$TestRequest = "SELECT * FROM MastertableProcess"; // Composition requette SQL
							$masterbasetableSql = $TestRequest; // Récupération de toute valeur d'une table
							$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql); // Préparation requete
							$masterbasetableSta->execute(); // Execussion requete
							$masterbasetableLt1 = $masterbasetableSta->fetchAll(); // Recupération value
						
							foreach ($masterbasetableLt1 as $masterbasetableLt2) { // Boucle sur les lignes
							
								
								?><button class="btnProcess" type="btn" style="width:100%" onclick="location.href='/Hermes/Hermes.php?IdPage=1&Idprocess=<?php echo $masterbasetableLt2['Id']; ?>'"><img src="images/<?php echo $masterbasetableLt2['ICONE'] ?>.png" alt="Modification" style="width:42px;height:30px"> Processus : <?php echo $masterbasetableLt2['CHAP']; ?> - <?php echo $masterbasetableLt2['NOM']; ?></button><?php // Depart ligne
								?> <br><?php
							}
						
						}
						

					break;
					
					case 1: // Page Menu
						
						$Idprocess = $_GET['Idprocess'];
						
						$bdd = new PDO('mysql:mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root');
						
						$query = $bdd->prepare('show tables'); // Liste des table SQL
						$query->execute();
						
						$VerifTableProcess = true; // Condition
						
						while($rows = $query->fetch(PDO::FETCH_ASSOC)){ // Boucle sur les tables
							
							If ($rows['Tables_in_hermes'] == 'mastertablemenu') {
							
								$VerifTableProcess = false; // Si la table existe 'False'												
								
							}

						}
						
						If ($VerifTableProcess == true){ // Si la table n'xiste pas alors création
														
							$servname = 'localhost';
							$dbname = 'hermes';
							$user = 'root';
							$pass = 'root';
								
							try{
									$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
									$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "CREATE TABLE mastertablemenu(
											Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
											IdProcess VARCHAR(256) NOT NULL,
											CHAP VARCHAR(256) NOT NULL,
											NOM VARCHAR(256) NOT NULL,
											ICONE VARCHAR(256) NOT NULL
											)";
									
									$dbco->exec($sql);
									
								}
								
								catch(PDOException $e){
									echo "Erreur : " . $e->getMessage();
								}
							
											
						}
						else {
							
							//echo 'test';
							
							$TestRequest = "SELECT * FROM mastertablemenu WHERE IdProcess = '$Idprocess'"; // Composition requette SQL  WHERE `mastertablemenu`.`Id` = 1
							$masterbasetableSql = $TestRequest; // Récupération de toute valeur d'une table
							$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql); // Préparation requete
							$masterbasetableSta->execute(); // Execussion requete
							$masterbasetableLt1 = $masterbasetableSta->fetchAll(); // Recupération value
						
							foreach ($masterbasetableLt1 as $masterbasetableLt2) { // Boucle sur les lignes
							
								
								?><button class="btnProcess" type="btn" style="width:100%" onclick="location.href='/Hermes/Hermes.php?IdPage=2'"><img src="images/<?php echo $masterbasetableLt2['ICONE'] ?>.png" alt="Modification" style="width:42px;height:30px"> Processus : <?php echo $masterbasetableLt2['CHAP']; ?> - <?php echo $masterbasetableLt2['NOM']; ?></button><?php // Depart ligne
								?> <br><?php
							}
						
						}


					break;
					
					case 2: 

					break;
					
					case 3: 

					break;
					
					case 4: // Page liste table
						
						// mysql:host=localhost;dbname=hermes;charset=utf8
						
						$bdd = new PDO('mysql:mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root');
						
						$query = $bdd->prepare('show tables');
						$query->execute();
						 
						while($rows = $query->fetch(PDO::FETCH_ASSOC)){
							
							 ?><button style="width:100%" type="btn" onclick="location.href='/Hermes/Hermes.php?IdPage=5&IdTable=<?php echo $rows['Tables_in_hermes']; ?>'"><?php echo $rows['Tables_in_hermes']; ?></button><?php
						}
												
					break;
					
					case 5: // Page tableau table

						$Compteur = 0; // Definition du compteur de collum
						$NomTable = $TableSql; // Variable du nom de la table
						
						try 
						{
							// On se connecte à MySQL
							$bdd = new PDO('mysql:mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root');
						}
						catch(Exception $e)
						{
							// En cas d'erreur, on affiche un message et on arrête tout
							die('Erreur : '.$e->getMessage());
						}

						$sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$NomTable'" ; // Requete pour recuper les colums
						$req = $bdd->query($sql); // Definition requete
						
						
						
						while ($donnees = $req->fetch()) // Boucle sur les collum
						{
							
							$resStr = str_replace('_', ' ', $donnees['column_name']);  // Remplace "_" par " " 
							
							?><form action="Hermes_ModifColTable.php?IdTable=<?php echo $TableSql?>&IdCollum=<?php echo $resStr?>" method="POST"><?php							
							?> <th><input style="width:80%;" type="text" value="<?php echo $resStr?>" id="Collone" name="ColloneDsP"> <?php // Création de l'en tete
							?><button type="Submit"><img src="images/pencil.png" alt="Modification" style="width:13px;height:13px"></button></form><?php
							?><button type="btn" onclick="location.href='/Hermes/Hermes_SupriColTable.php?IdTable=<?php echo $TableSql?>&IdCollone=<?php echo $resStr?>'"><img src="images/cross.png" alt="Modification" style="width:13px;height:13px"></button><?php
							$ValueColum[] = $donnees['column_name']; // Mise dans une table des noms de collums
							$Compteur ++; // + 1 sur le compteur
						}
						
						?><th><button type="btn" onclick="location.href='/Hermes/Hermes_InsrtLigTable.php?IdTable=<?php echo $TableSql?>&IdCollum=<?php echo $resStr?>'"><img src="images/plus.png" alt="Modification" style="width:13px;height:13px"></button></th></th><?php
						
						?>  </tr> <?php // Fin en tete
										
						$Compteur --; // Soustraction compteur 
				
						$TestRequest = "SELECT * FROM " .$NomTable; // Composition requette SQL
						$masterbasetableSql = $TestRequest; // Récupération de toute valeur d'une table
						$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql); // Préparation requete
						$masterbasetableSta->execute(); // Execussion requete
						$masterbasetableLt1 = $masterbasetableSta->fetchAll(); // Recupération value
						
						foreach ($masterbasetableLt1 as $masterbasetableLt2) { // Boucle sur les lignes
							
							?>  <tr><form action="Hermes_ModifLigTable.php?IdTable=<?php echo $TableSql?>&NbColom=<?php echo $Compteur?>" method="POST"> <?php // Depart ligne
							
							$lines = 0; // Compteur colom
							
											
							while ($lines <= $Compteur) { // Boucle sur les collum

								?> <th><input style="width:100px;" type="text" value="<?php echo $masterbasetableLt2[$ValueColum[$lines]];?>" id="ChapLigneBaseProcess" name="Collum<?php echo $lines?>"</th> <?php // Completion collum
								// http://localhost/Hermes/Hermes_ModifLigTable.php?IdTable=nouvelle_table&IdCollum=Testf%20ghfghfh
								$lines++; // $lines = $lines + 1
							}
							?> <th>
								<button type="Submit"><img src="images/pencil.png" alt="Modification" style="width:13px;height:13px"></button></form>
								<button type="btn" onclick="location.href='/Hermes/Hermes_SupriLigTable.php?IdTable=<?php echo $TableSql?>&IdLigne=<?php echo $masterbasetableLt2[$ValueColum[0]]?>&NbColom=<?php echo $Compteur?>'"><img src="images/cross.png" alt="Modification" style="width:13px;height:13px"></button>
								</th> <?php	
							?>  
							</tr> <?php // Fin ligne
							
						}
					
					break;
					
					case 6:

					break;
					
					case 7:

					break;
					
					default:

				}
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