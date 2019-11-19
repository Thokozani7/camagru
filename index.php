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

<?php header ("Location: gallery.php") ?>

<?php } else if (isset($_SESSION['username'])) {?>

<?php header ("Location: gallery.php") ?>
<?php }?>

</div>

    </body>
</html>