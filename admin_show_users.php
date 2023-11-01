<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/view/show_users_view.inc.php';
    include 'includes/show_users.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Pharmalink</title>
</head>
<body>


<div class='bold-line'></div>
    <div class='container'>
    <div class='window-large'>
        <div class='overlay-large'></div>
        <div class='content'>
            <div class='welcome'>Displaying all users in system</div>
            
            <?php
            displayRecords();
            ?>

        </div>
    </div>
    </div>
</body>
</html>