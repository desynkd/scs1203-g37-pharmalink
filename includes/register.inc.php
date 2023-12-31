<?php

require_once 'config_session.inc.php';

//Check if register is done by a admin usertype
if (!$_SESSION["user_type"] === 'admin')
{
    header("Location: ../index.php?action=unauthorized");
    die();
}



//If register is not accessed maliciously
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $usertype = $_POST["usertype"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'model/register_model.inc.php';
        require_once 'contr/register_contr.inc.php';

        //ERROR HANDLES
        $errors = [];

        if (isInputEmpty($username, $pwd, $email))
        {
            $errors["empty_input"] = "Fill in all Fields!";
        }
        if (!isEmailValid($email))
        {
            $errors["invalid_email"] = "Invalid Email used!";
        }
        if (isUsernameTaken($pdo, $username)) {
            $errors["username_used"] = "Username already taken!";
        }
        if (isEmailRegistered($pdo, $email, $usertype)) {
            $errors["email_used"] = "Email already registered for Role!";
        }

        if($errors)
        {
            $_SESSION["error_register"] = $errors;

            $registerData = [
                "username" =>  $username,
                "email" => $email
            ];
            $_SESSION["register_data"] = $registerData;

            header("Location: ../admin_user_register.php?register=fail");
            die();
        }

        if ($usertype == 'admin')
        {
            createUser($pdo, $username, $pwd, $email, $usertype);
            createAdminAccount($pdo, $username);
            header("Location: ../admin_user_register.php?signup=success");
        }
        else if ($usertype == 'pharmacist')
        {
            $_SESSION["create_username"] = $username;
            $_SESSION["create_pwd"] = $pwd;
            $_SESSION["create_email"] = $email;
            header("Location: ../admin_register_pharm.php?action=load");
        }
        else if ($usertype == 'patient')
        {
            $_SESSION["create_username"] = $username;
            $_SESSION["create_pwd"] = $pwd;
            $_SESSION["create_email"] = $email;
            header("Location: ../admin_register_patient.php");
        }
        else if ($usertype == 'sales')
        {
            $_SESSION["create_username"] = $username;
            $_SESSION["create_pwd"] = $pwd;
            $_SESSION["create_email"] = $email;
            header("Location: ../admin_register_sales.php?action=load");
        }
        else if ($usertype == 'supplier')
        {
            $_SESSION["create_username"] = $username;
            $_SESSION["create_pwd"] = $pwd;
            $_SESSION["create_email"] = $email;
            header("Location: ../admin_register_sup.php");
        }
        else if ($usertype == 'tech')
        {
            $_SESSION["create_username"] = $username;
            $_SESSION["create_pwd"] = $pwd;
            $_SESSION["create_email"] = $email;
            header("Location: ../admin_register_tech.php?action=load");
        }
        else
        {
            header("Location: ../admin_user_register.php?register=unidentified");
        }

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

}
else
{
    header("Location: ../admin_user_register.php?register=unauthorized");
    die();
}