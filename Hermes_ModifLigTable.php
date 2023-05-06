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


	if (!isset($_GET['IdTable']) || !isset($_GET['NbColom']))
	{

		echo('Manque des données.');
				
				// Arrête l'exécution de PHP
		return;
	}
	
	$IdTable = $_GET['IdTable']; // Id de la table
	$NbColom = $_GET['NbColom']; // Nombre de colums
	
	echo $IdTable;
	echo '-';
	echo $NbColom;

	// Valeur POST ----------------------------------------------------------


	$Compteurligne = $NbColom; // Transformation en integer
	$lines = 0;
	
	while ($lines <= $Compteurligne) { // Récupérer les valleurs des colums
	
		$CodeCollum = 'Collum' .$lines;
		$ValueColum[] = $_POST[$CodeCollum];	
		$lines++; // $lines = $lines + 1
		
	}
	
	// Titre Collone ----------------------------------------------------------
	
	try 
	{
		// On se connecte à MySQL
		$bddcolom = new PDO('mysql:mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
		die('Erreur : '.$e->getMessage());
	}
	
	$sqlcolom = "SELECT column_name FROM information_schema.columns WHERE table_name = '$IdTable'" ; // Requete pour recuper les colums
	$reqcolom = $bddcolom->query($sqlcolom); // Definition requete
						
	while ($donnees = $reqcolom->fetch()) // Boucle sur les collum
	{			
		$TitreColum[] = $donnees['column_name']; // Mise dans une table des noms de collums
	}
	
	$lines = 1;
	$RequeteSQL = '';
	while ($lines <= $Compteurligne) { // Récupérer les valleurs des colums
	
		$RequeteSQL = "{$RequeteSQL}`{$TitreColum[$lines]}` = '{$ValueColum[$lines]}',";
		$lines++; // $lines = $lines + 1
	
	}	
	
	
	echo ' ';
	echo ' ';
	echo ' ';
	
	$IdLigne = $ValueColum[0];
	
	echo ' ';
	echo ' ';
	echo ' ';
	
	$RequeteSQL = substr($RequeteSQL, 0, -1);
	echo $RequeteSQL;
	// Insertion table

     $servname = 'localhost';
     $dbname = 'hermes';
     $user = 'root';
     $pass = 'root';
 
 // 
 
      
	try{
		$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        $sql = "UPDATE `$IdTable` SET $RequeteSQL WHERE `$IdTable`.`Id` = $IdLigne;";        
				$dbco->exec($sql);
                
		}
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
			}
	


?>

<?php
	header("Location: /Hermes/Hermes.php?IdPage=5&IdTable=$IdTable"); // Retour page original
	exit();
?>


