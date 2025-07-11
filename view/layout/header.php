<header class="main-header">
    <nav class="main-header__nav">
        <a href="index.php?page=accueil" class="main-header__logo">DevGarden</a>
        <ul class="main-header__menu">
            <li><a class="main-header__link" href="index.php?page=accueil">Accueil</a></li>
            <li><a class="main-header__link" href="index.php?page=panier">Mon Panier</a></li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                <li><a class="main-header__link" href="index.php?page=adminDashboard">Admin</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a class="main-header__link" href="index.php?page=profil">Profil</a></li>
                <li><a class="main-header__link" href="index.php?page=logout">Déconnexion</a></li>
            <?php else: ?>
                <li><a class="main-header__link" href="index.php?page=connexion">Connexion</a></li>
                <li><a class="main-header__link" href="index.php?page=register">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>