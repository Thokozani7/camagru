<?php
include_once "includes/login.inc.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
<!-- <h5>Login</h5> -->

<?php
if (!isset($_SESSION['username'])) { ?>

<a href="login.php">Login</a> |
<a href="register.php">Register</a> |

<?php } else if (isset($_SESSION['username'])) {?>

Welcome back
<?php
echo $_SESSION['username']; ?> | <a href="includes/logout.inc.php">Logout</a> |
<a href="profile.php">Profile</a> |
<?php }?>

</div>
    </body>
</html>