<?php

declare(strict_types=1);

function avalPharmacies(object $pdo)
{
    return getpharmacies($pdo);
}


function isTechInputEmpty(string $firstname, string $address, string $contactno)
{
    //INPUT: string firstname, lastname, address, contactno
    //OUTPUT: True if even one is empty or false if else
    if (empty($firstname) || empty($address) || empty($contactno)) {
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

function createPharmTech(object $pdo, string $firstname, string $lastname, string $address, string $contactno, string $empstatus, string $pharmacy)
{
    //INPUT: php data object, firstname, lastname, address, contactno, empstatus, pharmacy
    //PROCESS: Instruct model to create new ptechnician in phamacy_technician
    setStaff($pdo, $firstname, $lastname, $address, $contactno, $empstatus, $pharmacy);
    $staffid = (string)getStaffId($pdo, $firstname, $lastname, $address, $contactno, $empstatus, $pharmacy);
    setPharmTech($pdo, $staffid);
    return $staffid;
}

function createTechAccount(object $pdo, string $username, string $staffid)
{
    //INPUT: php data object, username, staffid
    //PROCESS: Instruct model to create new technician in sys_accounts
    $userid = (string)getUserId($pdo, $username);
    setAccount($pdo, $userid, $staffid, NULL, NULL);
}