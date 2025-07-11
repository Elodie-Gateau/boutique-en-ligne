<?php if (!empty($message)): ?>
    <div class="register__success"><?= $message ?></div>
<?php endif; ?>

<div class="register">
    <h2 class="register__title">Inscription</h2>
    <form action="index.php?page=register" method="POST" class="register__form">
        <label for="nom" class="register__label">
            Nom*<br>
            <input id="nom" type="text" name="nom" class="register__input">
            <?php if (!empty($errors['nom'])): ?>
                <div class="register__error"><?= $errors['nom'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="prenom" class="register__label">
            Prénom*<br>
            <input id="prenom" type="text" name="prenom" class="register__input">
            <?php if (!empty($errors['prenom'])): ?>
                <div class="register__error"><?= $errors['prenom'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="email" class="register__label">
            Email*<br>
            <input id="email" type="email" name="email" class="register__input">
            <?php if (!empty($errors['email'])): ?>
                <div class="register__error"><?= $errors['email'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="password" class="register__label">
            Mot de passe*<br>
            <input id="password" type="password" name="password" class="register__input">
            <?php if (!empty($errors['password'])): ?>
                <div class="register__error"><?= $errors['password'] ?></div>
            <?php endif; ?>
        </label><br>

        <button type="submit" class="register__submit">S'inscrire</button>
    </form>

    <p class="register__note">
        <small>Les champs marqués d'un * sont obligatoires.</small>
    </p>
</div>