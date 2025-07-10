<?php


function passwordHash($passwordBrut)
{
    return password_hash($passwordBrut, PASSWORD_DEFAULT);
}

function passwordVerify($password, $passwordHach)
{
    password_verify($password, $passwordHach);
}
