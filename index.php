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
require_once('./utils/utils.php');
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
        <a href="index.php?page=register">S'inscrire</a> |
        <a href="index.php?page=login">Se connecter</a>
        <a href="index.php?page=admin">Espace Administrateur</a>
    </nav>

    <?php Router::redirect(); ?>

</body>

</html>