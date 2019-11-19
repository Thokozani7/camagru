<!DOCTYPE html>
<?php require "includes/register.inc.php"; 
//  foreach ($_SESSION["errors"] as $value)
//  {
//      echo $value."<br>";
//  }
?>

<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body class="back_or">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
                <?php
                    if (!isset($_SESSION['username'])) { ?>

                        <a class="nav-link" href="login.php">Login</a>


                        <a class="nav-link" href="register.php">Register</a>


                        <a href="gallery.php">Gallery</a>
                <?php } ?>
        </div>
        <form class="tk_form" action="includes/register.inc.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                    <h1  align="center">Sign-Up</h1>
            
            <div color = "red">
            <?php $x = $_SESSION["errors"] ?>
                <?php if(count($x) > 0): ?>
                    <?php foreach($x as $value): ?>
                        <li> <?php echo $value; ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php unset($_SESSION['errors']); ?>
              <label>Name:</label>
              <input type="text" name="username" value="" class="form-control"  placeholder="Your Name" required> 
            </div>
            <br>
            <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" name="email" value="" class="form-control"  placeholder="Enter email" required>
            </div>
            <br>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" minlength="6" pattern="(?=\S*\d)(?=\S*[a-z])(?=\S*[A-Z])\S*" title="password must contain at least 1 uppercase, lowercase, digit, special character, min of 6 characters" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
          </form>
    </body>
</html>