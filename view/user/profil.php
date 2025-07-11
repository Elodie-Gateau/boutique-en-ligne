<?php

if (!isset($_SESSION['email'])) {
    header('Location: index.php?page=connexion');
    exit;
}
?>


<h2>Mon Profil</h2>

<ul>
    <li><strong>Nom :</strong> <?= e($_SESSION['nom']) ?></li>
    <li><strong>Prénom :</strong> <?= e($_SESSION['prenom']) ?></li>
    <li><strong>Email :</strong> <?= e($_SESSION['email']) ?></li>
</ul>