<div class="register">
    <h2 class="register__title">Mon Profil</h2>
    <ul class="register__form">
        <li class="register__label"><strong>Nom :</strong> <?= e($_SESSION['nom'] ?? 'Non défini') ?></li>
        <li class="register__label"><strong>Prénom :</strong> <?= e($_SESSION['prenom'] ?? 'Non défini') ?></li>
        <li class="register__label"><strong>Email :</strong> <?= e($_SESSION['email'] ?? 'Non défini') ?></li>
    </ul>

    <a href="index.php?page=modifierProfil">
        <button class="register__submit">Modifier mes informations</button>
    </a>
</div>