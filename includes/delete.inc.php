<?php
include "dbh.inc.php";

if(isset($_POST['delete_post']))
{
    $imgpost = $_POST['image'];
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $sql = $dbh->prepare("DELETE FROM images WHERE image='$mgpost' ; ");
        $sql->execute();

        print_r($_POST);
        echo "image deleted";
    } catch (PDOExeption $e)
    {
        echo "Couldn't connect to database: ". $e->getMessage();
    }
}
?>