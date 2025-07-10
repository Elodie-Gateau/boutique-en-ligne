<header>

    <nav>
        <a href="index.php?page=accueil">Accueil</a> |
        <?php if (!isset($_SESSION['email'])): ?>
            <a href="index.php?page=register">S'inscrire</a> |
            <a href="index.php?page=connexion">Se connecter</a> |
        <?php else: ?>
            <a href="index.php?page=logout">Déconnexion</a>
        <?php endif; ?>
        <a href="index.php?page=admin">Espace Administrateur</a>
    </nav>

</header>