<?php require "includes/reset_password.inc.php"; 
$_SESSION["key"] = $_GET['key'];
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
                    <h1  align="center">Reset password</h1>
            <br>
            <div class="form-group">
                <label >New Password:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
          </form>
    </body>
</html>