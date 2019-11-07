<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body class="back_or">
    <a href="./profile.php" >Back</a>
        <form class="tk_form" action="includes/update.inc.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                   
            <div class="form-group">
            <?php if ($_GET['mode'] == "email") {?>
                <h1  align="center">Change Email</h1>

        <!-- displaying errors -->
            <div color = "red">
                <?php if(count($_GET["errors"]) > 0): ?>
                        <li> <?php echo $_GET["errors"]; ?></li>
                <?php endif; ?>
            </div>
            <?php unset($_GET['errors']); ?>

            <br>
                <label >New Email:</label>
                <input type="email" name="email" value="" class="form-control" placeholder="New Email" required>
            <?php } ?>
            <?php if ($_GET['mode'] == "username") {?>
                <h1  align="center">Change Username</h1>
            <br>
                <label >New Username:</label>
                <input type="text" name="username" value="" class="form-control" placeholder="New Username" required>
            <?php } ?>
            </div>
            <br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
          </form>
    </body>
</html>