<!-- <section class="register">
    <h2>Créer votre compte</h2>
    <form action="index.php?page=register" method="POST">
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>

        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="S'inscrire">
    </form>
</section> -->


<?php require_once './view/layout/head.php'; ?>

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