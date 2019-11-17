<?php

include "dbh.inc.php";
session_start();

    var_dump($_POST);
    $img = $_POST["save_image"];
    // $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace('data:image/jpeg;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $fileData = base64_decode($img);
    $fileName = '../uploads/' . uniqid() . 'myCanvas.png';
    file_put_contents($fileName, $fileData);

    echo $email = $_SESSION['email'];
    echo $token = $_SESSION['token'];
    try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $fileName1 = str_replace('../uploads/', '', $fileName);
    $sql = "INSERT INTO images (image, user, text) VALUES ('$fileName1', '$email', '$token');";
    $dbh->exec($sql);
    } catch (PDOExeption $e) {
        echo "Not connected: ". $e->getMessage;
    }

    // $target = "../uploads/". $fileName;
    // move_uploaded_file($fileName, $target);
?>