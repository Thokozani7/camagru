<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <hr>
        <form action="includes/reset_password.inc.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                    <h1  align="center">Reset email</h1>
            <br>
            <div class="form-group">
            <?php if ($_GET['mode'] == "email") {?>
                <label >New Email:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            <?php } ?>
            <?php if ($_GET['mode'] == "email") {?>
                <label >New Username:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            <?php } ?>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
          </form>
    </body>
</html>