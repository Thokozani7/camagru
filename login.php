<!DOCTYPE html>
<?php require "includes/register.php"; ?>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <hr>
        <form action="includes/register.php" method = "POST">
            <img class="login" src="img/login.png" >
            <div class="form-group">
            <h1  align="center">Sign-in</h1>
            <?php 
            echo $username;
            ?>
              <label>Email address:</label>
              <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <br>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <br>
            <input type="submit" name="submit" value="login" class="btn btn-primary">
            <form action="register.html">
            <input  type="submit" name="submit" value="sign-up" class="btn btn-primary">
            </form>
          </form>
    </body>
</html>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

