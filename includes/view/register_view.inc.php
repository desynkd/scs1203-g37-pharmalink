<?php

declare(strict_types=1);

function registerInput()
{
    if (isset($_SESSION["register_data"]["username"]) && !isset($_SESSION["errors_register"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["register_data"]["username"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="username" placeholder="Username" class="input-line full-width"></input>';
    }

    if (isset($_SESSION["register_data"]["email"]) && !isset($_SESSION["errors_register"]["email_used"]) && !isset($_SESSION["errors_register"]["invalid_email"])) {
        echo '<input type="email" name="email" placeholder="Email" value="' . $_SESSION["register_data"]["email"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="email" name="email" placeholder="Email" class="input-line full-width"></input>';
    }

    echo '<input type="password" name="pwd" placeholder="Password" class="input-line full-width"></input>';
    echo '<label for="id_usertype" class="input-label full-width" >User Type</label>';
    echo '<select name="usertype" id="id_usertype" class="input-select full-width" >';
    echo '<option value="admin">Admin</option>';
    echo '<option value="patient">Patient</option>';
    echo '<option value="supplier">Supplier</option>';
    echo '<option value="pharmacist">Pharmacist</option>';
    echo '<option value="sales">Sales Associate</option>';
    echo '<option value="tech">Pharmacy Technician</option>';
    echo '</select>';
}

function checkRegisterErrors()
{
    if (isset($_SESSION['error_register'])) {
        $errors = $_SESSION['error_register'];

        echo "<br>";

        foreach($errors as $error)
        {
            echo '<label>';
            echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
            echo '<div class="alert error">';
            echo '<span class="alertClose">X</span>';
            echo '<span class="alertText">' . $error;
            echo '<br class="clear"/></span>';
            echo '</div>';
            echo '</label>';
        }

        unset($_SESSION['error_register']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success" ) {
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert success">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Register Success';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    }
    else if (isset($_GET["register"]) && $_GET["register"] === "unidentified" ) {
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert error">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Unidentified Registration Type';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    }  
    else if (isset($_GET["register"]) && $_GET["register"] === "unauthorized" ) {
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert error">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Invalid Registration Permissions';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    } 
    else if (isset($_GET["deparload"]) && $_GET["deparload"] === "invalid" ) {
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert error">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Unable to load staff department';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    } 
    else if (isset($_GET["deparupdate"]) && $_GET["deparupdate"] === "fail" ) {
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert error">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Unable to update staff department';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    } 
}