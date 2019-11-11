<?php
include "dbh.inc.php";
session_start();

if ($_POST['save'])
{
    $email = $_SESSION['email'];
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    // print_r($_POST['checkbox']);
    if ($_POST['checkbox'] == NULL)
    {
        $query = $dbh->prepare("UPDATE `users` SET  `notif` = 0 WHERE `users`.`email` = '$email' ;");
        $query->execute();
        $_SESSION['notif'] = 0;

        echo "it is off";
    } else if ($_POST['checkbox'] == on)
    {
        $query = $dbh->prepare("UPDATE `users` SET  `notif` = 1 WHERE `users`.`email` = '$email' ;");
        $query->execute();
        $_SESSION['notif'] = 1;
        echo "it is on";
    }
}

// $query = $conn->prepare("UPDATE `users` SET `username` = '$new_Username', `email` = '$new_Email', `password` = '$new_Password', `mail_preference` = '$mail_preference' WHERE `users`.`username` = '$old_Username'");
//             $query->execute();

//             if ($query)
//             {
//                 echo "<div class='updated_successfully'>Updated</div>";
//         }

?>