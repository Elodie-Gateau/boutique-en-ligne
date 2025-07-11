<div class="register">
    <h2 class="register__title">Modifier mon profil</h2>
    <form action="index.php?page=modifierProfil" method="POST" class="register__form">
        <label class="register__label">Nom :
            <input type="text" name="nom" class="register__input" value="<?= e($_SESSION['nom']) ?>" required>
        </label>

        <label class="register__label">Prénom :
            <input type="text" name="prenom" class="register__input" value="<?= e($_SESSION['prenom']) ?>" required>
        </label>

        <label class="register__label">Email :
            <input type="email" name="email" class="register__input" value="<?= e($_SESSION['email']) ?>" required>
        </label>

        <button type="submit" class="register__submit">Enregistrer</button>
    </form>
</div>