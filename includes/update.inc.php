

<?php

include_once "";

if(isset($_POST['submit']))
{
    if(isset($_POST['email']))
    {
        $sql = "UPDATE users SET varified=1 WHERE token='$token'";
        $dbh->exec($sql);
    }
}
?>