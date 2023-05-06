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


	if (!isset($_GET['IdTable']) || !isset($_GET['IdCollum']))
	{

		echo('Manque des données.');
				
				// Arrête l'exécution de PHP
		return;
	}

	echo 'Test';
	echo '-';
	
	$IdTable = $_GET['IdTable'];
	$IdCollum = $_GET['IdCollum']; // 
	
	foreach($_POST as $key => $value) {
		$tab[$key]=$value;
	}
	$loginUser=$tab[$login_Utilisateurs];
		
	$IdCollum = str_replace(' ', '_', $IdCollum); 
	
	echo $IdTable;
	echo '-';
	echo $IdCollum;
	echo '-';
	echo $tab;
	// Insertion table

     $servname = 'localhost';
     $dbname = 'hermes';
     $user = 'root';
     $pass = 'root';
 
 // ALTER TABLE `$IdTable` ADD `nouvelle` TEXT NOT NULL AFTER `Test_collom`;
 
       
	try{
		$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
		$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        $sql = "ALTER TABLE `$IdTable` ADD `New` TEXT NOT NULL AFTER `$IdCollum`;";        
				$dbco->exec($sql);
                
		}
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
			}
	
	//SELECT nom_a_modifier as nouveau_nom
    //http://localhost/Hermes/Hermes_test.php?IdPage=5&IdTable=nouvelle_table


?>

<?php
	header("Location: /Hermes/Hermes.php?IdPage=5&IdTable=$IdTable"); // Retour page original
	exit();
?>


