<?php 
 require_once "includes/dbh.inc.php";

try {
    $token = $_GET['token'];
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    // $dbh = new PDO("mysql:host=localhost;dbname=camagru", "root", "123456789");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE users SET varified=1 WHERE token='$token'";
    $dbh->exec($sql);
    echo "Updated";
} catch (PDOException $e) {
    echo "Couldn't Varify: ". $e->getMessage();
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>VARIFIED</h1><br>
        <a href="login.php"><input type="button" name="submit" value="login"></a>
    </body>
</html>