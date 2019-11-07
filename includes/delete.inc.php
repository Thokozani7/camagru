<?php
include "dbh.inc.php";

if(isset($_POST['delete_post']))
{
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM images where";
        print_r($_POST);
        print_r($_GET);
    } catch (PDOExeption $e)
    {
        echo "Couldn't connect to database: ". $e->getMessage();
    }
}
?>