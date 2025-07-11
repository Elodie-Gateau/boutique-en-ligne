<h2>Mon Profil</h2>

<ul>
    <li><strong>Nom :</strong> <?= e($_SESSION['nom'] ?? 'Non défini') ?></li>
    <li><strong>Prénom :</strong> <?= e($_SESSION['prenom'] ?? 'Non défini') ?></li>
    <li><strong>Email :</strong> <?= e($_SESSION['email'] ?? 'Non défini') ?></li>
</ul>

<a href="index.php?page=modifierProfil">
    <button>Modifier mes informations</button>
</a>