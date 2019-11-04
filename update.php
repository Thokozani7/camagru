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
        <form action="includes/update.inc.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                   
            <div class="form-group">
            <?php if ($_GET['mode'] == "email") {?>
                <h1  align="center">Reset Email</h1>
            <br>
                <label >New Email:</label>
                <input type="email" name="email" value="" class="form-control" placeholder="Password" required>
            <?php } ?>
            <?php if ($_GET['mode'] == "username") {?>
                <h1  align="center">Reset Username</h1>
            <br>
                <label >New Username:</label>
                <input type="password" name="username" value="" class="form-control" placeholder="Password" required>
            <?php } ?>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
          </form>
    </body>
</html>