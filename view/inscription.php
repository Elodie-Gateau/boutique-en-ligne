<?php
echo "Ma page d'inscription";

?>

<form action="index.php?page=inscription" method="POST">
    <input type="text" name="prenom">
    <input type="text" name="nom">
    <input type="text" name="email">
    <input type="text" name="password">
    <input type="submit">
</form>