<?php

include_once "dbh.inc.php";
// $_SESSION
session_start();
$errors = array();
$username = "";
$email = "";

if (isset($_POST['submit']))
{
    echo $username = $_POST["username"];
    echo $email = $_POST["email"];
    echo $password = $_POST["password"];

    // if($username == NULL|| $email == NULL || $password == NULL)
    // return ;
    // if($username != NULL|| $email != NULL || $password != NULL)
    // header("Location: ../register.html?already=signedin");
    if (empty($username))
    $errors["username"] = "Username required"
    if (empty($email))
    $errors["email"] = "E-mail required"
    if (empty($password))
    $errors["password"] = "Password required";
}
try{
$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$password = SHA1($password);
$sql = "INSERT INTO users (Username, email, passwd) VALUES ('$username', '$email', '$password');";
$dbh->exec($sql);
echo "Added to database!!";
$_SESSION["message"] = "You are logged in";
$_SESSION["username"] = $username;
header("Location: ../login.html")
// $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $sql = "DELETE FROM users";
// $dbh->exec($sql);
$dbh->close();
}
catch (PDOException $e){
    echo "Not connected: ". $e->getMessage();
}
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users email=$email LIMIT 1";
    $dbh->exec($sql);
    $result = $dbh->get_result();
    $user_count= $result->num_rows;

    if($user_count > 0)
    $errors["email"] = "E-mail is already in use."

    if(count($errors) === 0)
    {
        $token = bin2hex(random_bytes(50));
        $varified = false;
    }
}
?>