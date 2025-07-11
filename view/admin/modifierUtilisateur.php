<div class="register">
    <h2 class="register__title">Modifier l'utilisateur</h2>
    <form action="index.php?page=modifierUtilisateur" method="POST" class="register__form">
        <input type="hidden" name="id" value="<?= e($user->getId()) ?>">

        <label class="register__label">Nom :
            <input type="text" name="nom" class="register__input" value="<?= e($user->getNom()) ?>" required>
        </label>

        <label class="register__label">Prénom :
            <input type="text" name="prenom" class="register__input" value="<?= e($user->getPrenom()) ?>" required>
        </label>

        <label class="register__label">Email :
            <input type="email" name="email" class="register__input" value="<?= e($user->getEmail()) ?>" required>
        </label>

        <label class="register__label">Admin :
            <select name="admin" class="register__input">
                <option value="1" <?= $user->getAdmin() ? 'selected' : '' ?>>Oui</option>
                <option value="0" <?= !$user->getAdmin() ? 'selected' : '' ?>>Non</option>
            </select>
        </label>

        <button type="submit" class="register__submit">Enregistrer</button>
    </form>
</div>