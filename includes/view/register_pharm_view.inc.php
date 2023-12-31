<?php

declare(strict_types=1);

function registerInput()
{
    /*
    hireDate DATE,
    terminationDate DATE,*/
    if (isset($_SESSION["register_data"]["firstname"])) {
        echo '<input type="text" name="firstname" placeholder="First Name" value="' . $_SESSION["register_data"]["firstname"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="firstname" placeholder="First Name" class="input-line full-width"></input>';
    }

    if (isset($_SESSION["register_data"]["lastname"])) {
        echo '<input type="text" name="lastname" placeholder="Last Name" value="' . $_SESSION["register_data"]["lastname"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="lastname" placeholder="Last Name" class="input-line full-width"></input>';
    }

    if (isset($_SESSION["register_data"]["address"])) {
        echo '<input type="text" name="address" placeholder="Address" value="' . $_SESSION["register_data"]["address"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="address" placeholder="Address" class="input-line full-width"></input>';
    }

    if (isset($_SESSION["register_data"]["contactno"]) && !isset($_SESSION["errors_register"]["contactno_invalid"])) {
        echo '<input type="text" name="contactno" placeholder="Contact Number" value="' . $_SESSION["register_data"]["contactno"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="contactno" placeholder="Contact Number" class="input-line full-width"></input>';
    }

    if (isset($_SESSION["register_data"]["regno"]) && !isset($_SESSION["errors_register"]["regno_invalid"])) {
        echo '<input type="text" name="regno" placeholder="SPB Registeration Number" value="' . $_SESSION["register_data"]["regno"]  .'" class="input-line full-width"></input>';
    }
    else{
        echo '<input type="text" name="regno" placeholder="SPB Registration Number" class="input-line full-width"></input>';
    }

    echo '<label for="id_hiredate" class="input-label full-width" >SPB Hire Date</label>';
    echo '<input type="date" id="id_hiredate" name="hiredate" class="input-line full-width"></input>';
    echo '<label for="id_termdate" class="input-label full-width" >SPB Termination Date</label>';
    echo '<input type="date" id="id_termdate" name="termdate" class="input-line full-width"></input>';

    echo '<label for="id_empstatus" class="input-label full-width" >User Type</label>';
    echo '<select name="empstatus" id="id_empstatus" class="input-select full-width" >';
    echo '<option value="Full">Full-Time</option>';
    echo '<option value="Part">Part-Time</option>';
    echo '</select>';

    if (isset($_SESSION["pharmacies"]))
    {
        echo '<label for="id_pharmacies" class="input-label full-width" >Pharmacy</label>';
        echo '<select name="pharmacy" id="id_pharmacies" class="input-select full-width" >';
        foreach ($_SESSION["pharmacies"] as $pharmacy) {
            echo '<option value="' . (string)$pharmacy["id"] . '">' . $pharmacy["name"] . '</option>';
        }
        echo '</select>';
    }
    else
    {
        //redirect to register user
        echo '<label>';
        echo '<input type="checkbox" class="alertCheckbox" autocomplete="off" />';
        echo '<div class="alert error">';
        echo '<span class="alertClose">X</span>';
        echo '<span class="alertText">Unable to Load pharmacies';
        echo '<br class="clear"/></span>';
        echo '</div>';
        echo '</label>';
    }

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
    }
}