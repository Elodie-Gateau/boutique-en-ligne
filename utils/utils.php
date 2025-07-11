<?php


function passwordHash($passwordBrut)
{
    return password_hash($passwordBrut, PASSWORD_DEFAULT);
}

function passwordVerify($password, $passwordHach)
{
    return password_verify($password, $passwordHach);
}



function verifyForm($nom, $prenom, $email, $password)
{
    $errors = [];

    if (!empty($_POST)) {
        if (empty($nom)) {
            $errors['nom'] = "Le nom ne peut pas être vide.";
        }
        if (empty($prenom)) {
            $errors['prenom'] = "Le prénom ne peut pas être vide.";
        }
        if (empty($email)) {
            $errors['email'] = "L'adresse email ne peut pas être vide.";
        } elseif (!preg_match('/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/', $_POST['email'])) {
            $errors['email'] = "Adresse email invalide.";
        }
        if (empty($password)) {
            $errors['password'] = "Le mot de passe ne peut pas être vide.";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
            $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.";
        }
    }

    return $errors;
}


function e($string)
{
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}
