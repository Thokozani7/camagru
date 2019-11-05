<?php 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body class="back_or">
        <hr>
        <form action="includes/login.inc.php" method="POST">
            <img class="login" src="img/login.png" >

            <div class="form-group">

            <h1  align="center">Sign-in</h1>

            <div style="background-color: red;">
                <?php if(isset($_GET['error_code'])): ?>
                        <li> <?php echo $_GET['error_code']; ?></li>
                <?php endif; ?>
            </div>

              <label>Email address:</label>

              <input type="email" name="email" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>

            </div>

            <br>

            <div class="form-group">
                <label >Password:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <input type="submit" name="log_submit" value="login" class="btn btn-primary">

            </form>
        <form>
            <input formaction="register.php" type="submit" name="submit-sup" value="sign-up" class="btn btn-primary">
            <a href="forgot.php" >Forgot password</a>
            
        </form>
        
          
    </body>
</html>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

