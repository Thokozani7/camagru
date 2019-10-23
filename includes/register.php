<?php

include_once "dbh.inc.php";

if (isset($_POST['submit']))
{
    echo $username = $_POST["username"];
    echo $email = $_POST["email"];
    echo $password = $_POST["password"];
}
try{
$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$password = SHA1($password);
$sql = "INSERT INTO users (Username, email, passwd) VALUES ('$username', '$email', '$password');";
$dbh->exec($sql);
echo "Added to database!!";
}
catch (PDOException $e){
    echo "Not connected: ". $e->getMessage();
}
?>