<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/view/login_view.inc.php';
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
    <div class='window'>
        <div class='overlay'></div>
        <div class='content'>
            <div class='welcome'>Welcome to Pharmalink</div>
            <form action="includes/login.inc.php" method="post">
                <div class='input-fields'>
                    <input type='text' name="username" placeholder='Username' class='input-line full-width'></input>
                    <!-- <input type='email' name="email" placeholder='Email' class='input-line full-width'></input> -->
                    <input type='password' name="pwd" placeholder='Password' class='input-line full-width'></input>

                </div>
                <div><button class='ghost-round full-width'>Login</button></div>
            </form>
            
            <?php 
                checkLoginErrors();
            ?>
        </div>
    </div>
    </div>
</body>
</html>

