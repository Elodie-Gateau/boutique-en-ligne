<?php require_once './view/layout/head.php' ?>


<div class="connexion">
    <h2>Connexion au compte</h2>
    <form action="index.php?page=connexion" method="POST">

        <label for="email">Email* <br>
            <input type="email" name="email" required></label> <br>

        <label for="password">Mot de passe* <br>
            <input type="password" name="password" required></label> <br>

        <input type="submit" value="Se connecter">

    </form>

    <p class="form-note">
        <small>Les champs marqués d'un * sont obligatoires.</small>
    </p>
</div>