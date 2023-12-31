<?php 
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Pharmalink - Patient</title>
</head>
<body>
<div class='bold-line'></div>
    <div class='container'>
    <div class='window' style='Height: 660px;'>
        <div class='overlay' style='Height: 660px;'></div>
        <div class='content'>
            <?php
                echo "<div class='welcome'>Hello, " . $_SESSION["user_username"] . "</div>";
                echo "<div class='subtitle'>You are logged in as " . $_SESSION["user_type"] . "</div>";
            ?>

            <form action="patient_profile.php" method="post">
                <div style="padding: 30px 10px 5px;" ><button class='ghost-round full-width'>View Profile</button></div>
            </form>
            <form action="patient_vitalsign.php" method="post">
                <div style="padding: 5px 10px 5px;" ><button class='ghost-round full-width'>View Vital Sign Records</button></div>
            </form>
            <form action="patient_diagnosis.php" method="post">
                <div style="padding: 5px 10px 5px;" ><button class='ghost-round full-width'>View Diagnosis Records</button></div>
            </form>
            <form action="patient_order.php" method="post">
                <div style="padding: 5px 10px 5px;" ><button class='ghost-round full-width'>View Order Records</button></div>
            </form>
            <form action="includes/logout.inc.php" method="post">
                <div style="padding: 5px 10px 10px;" ><button class='ghost-round full-width'>Logout</button></div>
            </form>
            
        </div>
    </div>
    </div>
</body>
</html>