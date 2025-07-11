<?php

session_start();

require_once('./config/Database.php');
require_once('./controller/CommandesController.php');
require_once('./controller/ProduitsController.php');
require_once('./controller/UtilisateursController.php');
require_once('./model/Commandes.php');
require_once('./model/DetailCommande.php');
require_once('./model/Produits.php');
require_once('./model/Utilisateur.php');
require_once('./repository/CommandesRepository.php');
require_once('./repository/DetailCommandeRepository.php');
require_once('./repository/ProduitsRepository.php');
require_once('./repository/UtilisateursRepository.php');
require_once('./config/Router.php');
require_once('./utils/utils.php');
require_once('./controller/AdminController.php');
require_once('./controller/HomePageController.php');
require_once('./utils/utils.php');
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './view/layout/head.php' ?>

<body>

    <?php require_once './view/layout/header.php' ?>

    <main class="main-center">
        <?php Router::redirect(); ?>
    </main>

    <?php require_once './view/layout/footer.php' ?>

</body>

</html>