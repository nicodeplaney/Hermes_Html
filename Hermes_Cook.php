<!--
[P] Vérification si les donnée sont bien remplie
-->
<?php
			if (!isset($_POST['PseudoLigneUserDsP']) || !isset($_POST['PassewordLigneUserDsP'])) // (Mettre tout les champs DsP ici)
			{
				echo('Manque des données.');
				// Arrête l'exécution de PHP
				return;
			}
	?>
<!--
[D] Completion des données d'entrée
-->
<?php

$PseudoFormCokDeP = $_POST['PseudoLigneUserDsP'];
$PassewordFormCokDeP = $_POST['PassewordLigneUserDsP'];

?>
<!--
[D] Création cookie
-->
<?php
// Définit les cookies
setcookie("cookie[Pseudo]", $PseudoFormCokDeP);
setcookie("cookie[Passeword]", $PassewordFormCokDeP);
setcookie("cookie[Serveur]", "cookieone");

// Après le rechargemet de la page, nous les affichons
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);        
        echo "$name : $value <br />\n";
    }
}
?>
<!--
[C] Completion des données d'entrée
-->

<!--
[A] Ouverture de la page d'acceuil
-->	
<?php
	header('Location: /Hermes/Hermes.php?IdPage=0'); // Retour page original
	exit();
?>


</div>