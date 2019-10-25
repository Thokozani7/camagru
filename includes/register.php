<?php

include_once "dbh.inc.php";

if (isset($_POST['submit']))
{
    echo $username = $_POST["username"];
    echo $email = $_POST["email"];
    echo $password = $_POST["password"];

    // if($username == NULL|| $email == NULL || $password == NULL)
    // return ;
    if($username != NULL|| $email != NULL || $password != NULL)
    header("Location: ../register.html?already=signedin");
}
try{
$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$password = SHA1($password);
$sql = "INSERT INTO users (Username, email, passwd) VALUES ('$username', '$email', '$password');";
$dbh->exec($sql);
echo "Added to database!!";

// $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $sql = "DELETE FROM users";
// $dbh->exec($sql);
}
catch (PDOException $e){
    echo "Not connected: ". $e->getMessage();
}
?>