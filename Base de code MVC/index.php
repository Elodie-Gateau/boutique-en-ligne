<?php

require_once('config/Database.php');

// /////////////////////////////////////////////////// //
// REQUIRE DE TOUS LES MODELS/CONTROLLERS/REPOSITORIES //
// /////////////////////////////////////////////////// //

// require_once('./app/models/User.php');
// require_once('./app/models/UserRepository.php');
require_once('./controller/UserController.php');

require_once('config/Router.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique MVC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<h1>Ma super boutique !</h1>

<?php Router::redirect(); ?>

</body>
</html>