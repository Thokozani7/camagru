<?php
include_once "forgot.inc.php";

echo $res;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forgot password</title>
        <!-- <link rel="stylesheet" href="css/login.css"> -->
    </head>
    <body style="background-color: #f58529;">
        <form action="includes/forgot.inc.php" method="POST">
            <h2>Forgot password</h2>
            <hr>
            <label>Email address:</label>
            <input type="email" name="email" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
            <br>
            <br>
            <hr>
            <span style="color: white;"> <?php echo $_GET['result']."<br>"; unset($_GET['error']); ?></span>
            <hr>
            <input type="submit" name="validate" value="submit" class="btn btn-primary" >
        </form>
    </body>
</html>