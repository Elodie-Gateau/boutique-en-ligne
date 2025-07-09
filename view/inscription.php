<?php
echo "Ma page d'inscription";

?>

<form action="index.php?page=inscription" method="POST">

    <input type="text" name="prenom">
    <label for="nom">Nom</label>
    <input type="text" name="nom">
    <label for="email">Email</label>
    <input type="text" name="email">
    <label for="password">Mot de passe</label>
    <input type="text" name="password">
    <input type="submit" value="S'inscrire">
</form>