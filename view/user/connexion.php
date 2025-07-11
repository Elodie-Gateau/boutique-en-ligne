<div class="connexion">
    <h2 class="connexion__title">Connexion au compte</h2>
    <form action="index.php?page=connexion" method="POST" class="connexion__form">

        <label for="email" class="connexion__label">
            Email* <br>
            <input type="email" name="email" class="connexion__input" required>
        </label>
        <br>

        <label for="password" class="connexion__label">
            Mot de passe* <br>
            <input type="password" name="password" class="connexion__input" required>
        </label>
        <br>

        <input type="submit" class="connexion__submit" value="Se connecter">
    </form>

    <p class="connexion__note">
        <small>Les champs marqués d'un * sont obligatoires.</small>
    </p>
</div>