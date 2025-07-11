<h2>Modifier mon profil</h2>

<form action="index.php?page=modifierProfil" method="POST">
    <label>Nom :
        <input type="text" name="nom" value="<?= e($_SESSION['nom']) ?>" required>
    </label><br>

    <label>Prénom :
        <input type="text" name="prenom" value="<?= e($_SESSION['prenom']) ?>" required>
    </label><br>

    <label>Email :
        <input type="email" name="email" value="<?= e($_SESSION['email']) ?>" required>
    </label><br>

    <button type="submit">Enregistrer</button>
</form>