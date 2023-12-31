<?php

declare(strict_types=1);

function isInputEmpty(string $username, string $pwd)
{
    //INPUT : Username and pwd variables
    //OUTPUT : True if even one of variables is empty and false if else
    if (empty($username) || empty($pwd))
    {
        return true;
    }
    else
    {
        return false;
    }
}

/*function isEmailValid (string $email)
{
    //INPUT : Email variable
    //OUTPUT : True if email is valid and false if else
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        return true;
    }
    else
    {
        return false;
    }
}*/

function isUsernameCorrect(bool|array $result)
{
    //INPUT: Array or bool result variable
    //OUTPUT: True if result bool isnt false and false if else
    if ($result)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isPasswordCorrect(string $pwd, string $hashedPwd)
{
    //INPUT: Strings input password and hashed password in db
    //OUTPUT: True if matched and false if else
    if(password_verify($pwd, $hashedPwd))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isUserActive(string $userstatus)
{
    //INPUT: Array or bool result variable
    //OUTPUT: True if result bool isnt false and false if else
    if ($userstatus == '1')
    {
        return true;
    }
    else
    {
        return false;
    }
}