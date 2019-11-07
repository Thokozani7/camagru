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
        <hr>
        <form class="tk_form" action="includes/register.inc.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                    <h1  align="center">Sign-Up</h1>
            
            <div color = "red">
                <?php if(count($_SESSION["errors"]) > 0): ?>
                    <?php foreach($_SESSION["errors"] as $value): ?>
                        <li> <?php echo $value; ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php unset($_SESSION['errors']); ?>
              <label>Name:</label>
              <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" class="form-control"  placeholder="Your Name" required> 
            </div>
            <br>
            <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"  placeholder="Enter email" required>
            </div>
            <br>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
          </form>
    </body>
</html>