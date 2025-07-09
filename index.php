<?php

require_once('./config/Database.php');
require_once('./controller/CommandesCotroller.php');
require_once('./controller/ProduitsController.php');
require_once('./controller/UtilisateursController.php');
require_once('./model/Commandes.php');
require_once('./model/DetailCommande.php');
require_once('./model/Produits.php');
require_once('./model/Utilisateurs.php');
require_once('./repository/CommandesRepository.php');
require_once('./repository/DetailCommandeRepository.php');
require_once('./repository/ProduitsRepsitory.php');
require_once('./repository/UtilisateursRepository.php');
require_once('./config/Router.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en Ligne</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php?page=inscription">S'inscrire</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>

    <?php Router::redirect(); ?>

</body>

</html>