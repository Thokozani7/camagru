<?php
require_once 'database.php';

// CREATE DATABASE
try {
        // Connect to Mysql server

        $dbh = new PDO($DB_DSN1, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $dbh->prepare("CREATE DATABASE IF NOT EXISTS tcamagru");
        $sql->execute();
        echo "Database created successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR CREATING DB: \n".$e->getMessage();
        exit(1);
    }
// CREATE TABLE USERS
try {
        // Connect to DATABASE previously created

        //sql to create table
        $sql =$dbh->prepare("CREATE TABLE IF NOT EXISTS users (
          id INT(11)  AUTO_INCREMENT PRIMARY KEY NOT NULL,
          Username VARCHAR(50) NOT NULL,
          email VARCHAR(100) NOT NULL,
          passwd VARCHAR(255) NOT NULL,
          token VARCHAR(50) NOT NULL,
          notif INT(1) NOT NULL,
          varified INT(1) NOT NULL
        )");
        $sql->execute();
        echo "Table users created successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage() . "<br>";
    }
// CREATE TABLE GALLERY
try {
        // Connect to DATABASE previously created

        $sql = $dbh->prepare("CREATE TABLE IF NOT EXISTS images (
        `image_id` INT(11) AUTO_INCREMENT PRIMARY KEY, 
        `image`VARCHAR(200) NOT NULL,
        `user` VARCHAR(255) NOT NULL,
	    `text` TEXT(30) NOT NULL
    )");
        $sql->execute();
        echo "Table gallery created successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage() ."<br>";
    }
// CREATE TABLE LIKE
try {
        // Connect to DATABASE previously created

        $sql = $dbh->prepare("CREATE TABLE IF NOT EXISTS likes (
        `like_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `image_id` INT(11),
        `user` varchar(200),
        `image` varchar(200)
       )");
    $sql->execute();
        echo "Table like created successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage() ."<br>";
    }
// CREATE TABLE COMMENT
try {
        // Connect to DATABASE previously created
        
        $sql = $dbh->prepare("CREATE TABLE IF NOT EXISTS comments (
        `comment_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `Username` VARCHAR(255) NOT NULL,
        `comment` TEXT NOT NULL,
        `image_id` INT(255) NOT NULL,
        `date_added` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL	
       )");
        $sql->execute() ;
        echo "Table comment created successfully<br>";
    } catch (PDOException $e) {
        echo "ERROR CREATING TABLE: ".$e->getMessage() ."<br>";
    }
// //TEMP CAMERA IMAGE TABLE
// try {
//         // Connect to DATABASE previously created
//         $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
//         $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $sql = "CREATE TABLE IF NOT EXISTS  `cam` (
//             `id` int(11) NOT NULL,
//             `imgsrc` varchar(255) NOT NULL
//         )";
//         $dbh->exec($sql);
//         echo "Table cam created successfully<br>";
//     } catch (PDOException $e) {
//         echo "ERROR CREATING TABLE: ".$e->getMessage() ."<br>";
//     }
if (!file_exists('../uploads')) {
    mkdir('../uploads', 0777, true);
}
?>
​
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="index_redir">
    <button id="indexbtn" name="inbtn"><a href="../login.php">Index</a></button>
</div>
</body>
</html>