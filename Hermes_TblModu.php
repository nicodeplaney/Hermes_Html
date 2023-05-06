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
	
	<link href="styles/StylePage.css" rel="stylesheet" type="text/css">
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

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P1",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P1.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Planification

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P2",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P2.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
		  
		  
			<?php
			
			// Ged

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P3",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P3.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Mise en oeuvre

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P4",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P4.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
			
			<?php
			
			// Vérification

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P5",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P5.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>
		  
			<?php
			
			// Amélioration

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_9 = :id';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute([
					'id' => "P6",
					]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<a href="/Hermes/Hermes_ListSprocess.php?IdDsP=<?php echo $masterbasetableLt2['Collum_1']?>"><img src="/Hermes/images/P6.png" alt="" width=28 height=20 title=3" !"/><?php echo $masterbasetableLt2['Collum_3']?></a>
				<?php		
				}

			?>

		  </div>
		  
		  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
		  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		  </a>
		</div>
				
	<ul class="breadcrumb">
		<li><img src="/Hermes/images/Home.png" alt="Page" width=28 height=20 title=3" !"/><a href='/Hermes/Hermes_Acce.php'>Home</a></li>
		<li><img src="/Hermes/images/page.png" alt="Page" width=28 height=20 title=3" !"/><a href='/Hermes/Hermes_AddTable.php'>Table</a></li>
		<li><img src="/Hermes/images/page.png" alt="Page" width=28 height=20 title=3" !"/>Module</li>	  
	</ul>
	
	
 </header>
 
 	<form action="Hermes_AddModu.php" method="GET">
	  <h3>Nom du Module</h3>
	  <div class="input-container">
		<input class="input-field" type="text" placeholder="" id="ChapSLigneBaseProcess" name="ChapLigneBaseModuDsP">
	  </div>
		
		<h3>Sous Processus liée</h3>
		<select class="input-planification" id="ProcessLigneBaseSProcess" name="ProcessLigneBaseModuDsP">
		  
			<?php
			
			// Definition

				$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_2 = :Type';
				$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
				$masterbasetableSta->execute(['Type' => "2"]);
				$masterbasetableLt1 = $masterbasetableSta->fetchAll();


				foreach ($masterbasetableLt1 as $masterbasetableLt2) {
				?>
					<option value="<?php echo $masterbasetableLt2['Collum_1']?>"><?php echo $masterbasetableLt2['Collum_3']?></option>
				<?php		
				}

			?>
			
		</select>
			
	<br>
	<br>
	
	  <button type="submit" class="btn">Insertion</button>

	</form>


<?php
try
{
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=hermes;charset=utf8', 'root', 'root'); // Adresse de la base de donnée
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$masterbasetableSql = 'SELECT * FROM masterbasetable WHERE Collum_2 = :Type AND Collum_2 = :Type';
$masterbasetableSta = $mysqlClient->prepare($masterbasetableSql);
$masterbasetableSta->execute(['Type' => "2"]);
$masterbasetableLt1 = $masterbasetableSta->fetchAll();

// On affiche chaque recette une à une
foreach ($masterbasetableLt1 as $masterbasetableLt2) {

	// Ajout Du titre lier au processus

 ?>
		<table id="myTable">
			<tr class="header">
				<th style="width:8%;">Id</th>
				<th style="width:50;">Nom</th>
				<th style="width:18%;">Mode</th>
				<th style="width:25%;">Module entrée</th>
				<th style="width:8%;"></th>
			</tr>
			<h3><?php echo $masterbasetableLt2['Collum_3'] ?></h3>
	<?php

	// Déclaration 

	$masterbasetableSql1 = 'SELECT * FROM masterbasetable WHERE Collum_2 = :Type AND Collum_9 = :Process';
	$masterbasetableSta1 = $mysqlClient->prepare($masterbasetableSql1);
	$masterbasetableSta1->execute(['Type' => "3", 'Process' => $masterbasetableLt2['Collum_1'] ]);
	$masterbasetableLt11 = $masterbasetableSta1->fetchAll();	

	// Boucle sur les Sprocessus

	foreach ($masterbasetableLt11 as $masterbasetableLt21) {

		?>
		  <tr>
			<form action="Hermes_InstModu.php" method="GET">
			  <td><input class="input-Table-3" type="text" readonly="readonly" value="<?php echo $masterbasetableLt21['Collum_1'] ?>" id="ChapLigneBaseProcess" name="IdDsP"></td> 
			  <td><input class="input-Table-2" type="text" value="<?php echo $masterbasetableLt21['Collum_3'] ?>" id="ChapLigneBaseProcess" name="NomLigneBaseModuDsP"></td>
			  <td>	<select class="input-Table-2" id="Modutype" name="ModutypeDsP">
						<?php 
						
						switch ($masterbasetableLt21['Collum_6']) // on indique sur quelle variable on travaille
						{ 
							case 0: // dans le cas où $grade vaut 0
								?><option value="<?php echo $masterbasetableLt21['Collum_6'];?>">Standart</option><?php
							break;
							
							case 1: // dans le cas où $grade vaut 1
								?><option value="<?php echo $masterbasetableLt21['Collum_6'];?>">Tableau</option><?php
							break;
							
							case 2: // dans le cas où $grade vaut 5
								?><option value="<?php echo $masterbasetableLt21['Collum_6'];?>">Graph</option><?php
							break;
							
							case 3: // dans le cas où $grade vaut 5
								?><option value="<?php echo $masterbasetableLt21['Collum_6'];?>">Multipage</option><?php
							break;
						}
						?>

						<option value="0">Standart</option>
						<option value="1">Tableau</option>
						<option value="2">Graph</option>
						<option value="3">Multipage</option>
					</select>
				</td>
			  <td>	<select class="input-Table-2" id="Vecteurentree" name="VecteurentreeDsP">
						<?php 
						
						// Ajout vecteur d'entrée
						
						$Vecteur = $masterbasetableLt21['Collum_5'];
						
						if ($Vecteur == "0") {
						
							?><option value="<?php echo $masterbasetableLt21['Collum_5'];?>"><?php echo 'Module Orphelin';?></option><?php
						
						}
						else {
							
							// Déclaration 

							$masterbasetableSql3 = 'SELECT * FROM masterbasetable WHERE Collum_2 = :Type AND Collum_1 = :Vecteur';
							$masterbasetableSta3 = $mysqlClient->prepare($masterbasetableSql3);
							$masterbasetableSta3->execute(['Type' => "3", 'Vecteur' => $Vecteur ]);
							$masterbasetableLt13 = $masterbasetableSta3->fetchAll();	

							// Boucle sur les Sprocessus

							foreach ($masterbasetableLt13 as $masterbasetableLt23) {

								?><option value="<?php echo $masterbasetableLt23['Collum_1'];?>"><?php echo $masterbasetableLt23['Collum_3'];?></option><?php
								
							}
						
							?><option value="0"><?php echo 'Module Orphelin';?></option><?php
						
						}
						// Déclaration 

						$masterbasetableSql2 = 'SELECT * FROM masterbasetable WHERE Collum_2 = :Type';
						$masterbasetableSta2 = $mysqlClient->prepare($masterbasetableSql2);
						$masterbasetableSta2->execute(['Type' => "3" ]);
						$masterbasetableLt12 = $masterbasetableSta2->fetchAll();	

						// Boucle sur les Sprocessus

						foreach ($masterbasetableLt12 as $masterbasetableLt22) {

							?><option value="<?php echo $masterbasetableLt22['Collum_1'];?>"><?php echo $masterbasetableLt22['Collum_3'];?></option><?php

						}
						?>
					</select>
			  </td>
			  <td><button type="submit" class="btnModif" ><img src="images/pencil.png" alt="Modification" style="width:50%;height:50%"></button></td>
		  </form>
		  
		<?php

	}

}

?>


</table>
	<!-- Script Jscript -->
	
	<script src="scripts/Menu.js"></script>
 
</div>