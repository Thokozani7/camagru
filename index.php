<?php
include_once "includes/login.inc.php";
// session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
<!-- <h5>Login</h5> -->



<div class="navbar navbar-expand-lg navbar-light bg-light">
<?php
if (!isset($_SESSION['username'])) { ?>

        <a class="nav-link" href="login.php">Login</a>
    

        <a class="nav-link" href="register.php">Register</a>
  

        <a href="gallery.php">Gallery</a>
   
<!-- <a href="login.php">Login</a> |
<a href="register.php">Register</a> | -->

<?php } else if (isset($_SESSION['username'])) {?>

Welcome back
<?php
echo $_SESSION['username']; ?>
<a href="gallery.php">Gallery</a> |
<a href="my_uploads.php">My uploads</a> |
<a href="profile.php">Profile</a> |
<a href="includes/logout.inc.php">Logout</a> |
<?php }?>

</div>

    </body>
</html>