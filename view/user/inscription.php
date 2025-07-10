<?php require_once './view/layout/head.php'; ?>

<?php if (!empty($message)): ?>
    <div class="success"><?= $message ?></div>
<?php endif; ?>

<div>
    <h2>Inscription</h2>
    <form action="index.php?page=register" method="POST">
        <label for="nom">
            Nom*<br>
            <input id="nom" type="text" name="nom">
            <?php if (!empty($errors['nom'])): ?>
                <div><?= $errors['nom'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="prenom">
            Prénom*<br>
            <input id="prenom" type="text" name="prenom">
            <?php if (!empty($errors['prenom'])): ?>
                <div><?= $errors['prenom'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="email">
            Email*<br>
            <input id="email" type="email" name="email">
            <?php if (!empty($errors['email'])): ?>
                <div><?= $errors['email'] ?></div>
            <?php endif; ?>
        </label><br>

        <label for="password">
            Mot de passe*<br>
            <input id="password" type="password" name="password">
            <?php if (!empty($errors['password'])): ?>
                <div><?= $errors['password'] ?></div>
            <?php endif; ?>
        </label><br>

        <button type="submit">S'inscrire</button>
    </form>

    <p class="form-note">
        <small>Les champs marqués d'un * sont obligatoires.</small>
    </p>

</div>