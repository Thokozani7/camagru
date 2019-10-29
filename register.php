<!DOCTYPE html>
<?php require "includes/register.php"; ?>
<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <hr>
        <form action="includes/register.php" method="POST">
            <img class="login" src="img/sign-up.png" >
            <div class="form-group">
                    <h1  align="center">Sign-Up</h1>
            
            <?php if(count($errors) > 0): ?>
                <div>
                <?php foreach($errors as $value): ?>
                    <li> <?php echo $value; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
              <label>Name:</label>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control"  placeholder="Your Name" required> 
            </div>
            <br>
            <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" name="email" value="" class="form-control"  placeholder="Enter email" required>
            </div>
            <br>
            <div class="form-group">
                <label >Password:</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <input type="submit" name="submit" value="login" class="btn btn-primary">
          </form>
    </body>
</html>