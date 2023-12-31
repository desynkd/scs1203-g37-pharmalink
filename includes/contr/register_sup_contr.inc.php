<?php

declare(strict_types=1);

function isSupInputEmpty(string $firstname, string $address, string $contactno, string $regno)
{
    //INPUT: string firstname, lastname, address, contactno, regno
    //OUTPUT: True if even one is empty or false if else
    if (empty($firstname) || empty($address) || empty($contactno || empty($regno))) {
        return true;
    }
    else
    {
        return false;
    }
}

function isContactNoValid (string $contactNo)
{
    //INPUT : ContactNo variable
    //OUTPUT : True if contactNo is valid and false if else
    if (is_numeric($contactNo) && strlen($contactNo) == 10 ) 
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isRegNoValid (string $regNo)
{
    //INPUT : RegNo variable
    //OUTPUT : True if RegNo is valid and false if else
    if (strlen($regNo) <= 10 ) 
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isDatePassed(string $inputDate)
{
    //INPUT : Date string variable
    //OUTPUT : True if inputdate is larger than current date and false if else
    $currentDate = date("Y-m-d"); 

    if ($currentDate < $inputDate) 
    {
        return true;
    }
    else
    {
        return false;
    }
}

function createSupplier(object $pdo, string $firstname, string $lastname, string $address, string $contactno, string $regno)
{
    //INPUT: php data object, firstname, lastname, address, contactno, regno
    //PROCESS: Instruct model to create new supplier in suppliers
    setSupplier($pdo, $firstname, $lastname, $address, $contactno, $regno);
    $supid = (string)getSupplierId($pdo, $firstname, $lastname, $address, $contactno, $regno);
    return $supid;
}

function createSupAccount(object $pdo, string $username, string $supid)
{
    //INPUT: php data object, username, supid
    //PROCESS: Instruct model to create new supplier in user_accounts
    $userid = (string)getUserId($pdo, $username);
    setAccount($pdo, $userid, NULL, $supid, NULL);
}