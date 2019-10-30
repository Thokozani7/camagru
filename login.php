<?php 


if (isset($_POST['submit-sup']))
header ("Location: register.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <hr>
        <form action="includes/login.inc.php" method="POST">
            <img class="login" src="img/login.png" >
            <div class="form-group">
            <h1  align="center">Sign-in</h1>
            <?php 
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
           
            <input formaction="register.php" type="submit" name="submit-sup" value="sign-up" class="btn btn-primary">
          
          </form>
          
    </body>
</html>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

