<header>

    <div class="titrePrincipal">
        <h1 class="titre">
            <?php
            if (isset($_SESSION['prenom'])) {
                echo 'Bienvenue, ' . htmlspecialchars($_SESSION['prenom']) . ' !';
            } else {
                echo 'Bienvenue sur la boutique !';
            }
            ?>
        </h1>
    </div>


    <nav class="navbar">
        <ul class="menu">
            <li> <a href="index.php?page=accueil">Accueil</a></li>
            <?php if (!isset($_SESSION['email'])): ?>
                <li><a href="index.php?page=register">S'inscrire</a></li>
                <li><a href="index.php?page=connexion">Se connecter</a></li>
            <?php else: ?>
                <li><a href="index.php?page=logout">Déconnexion</a></li>
            <?php endif; ?>
            <li><a href="index.php?page=admin">Espace Administrateur</a></li>
        </ul>
    </nav>

</header>