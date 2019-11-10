<?php
include "dbh.inc.php";
session_start();
// $msg = "";
// $css_class = "";

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mail = $_SESSION['email'];
    $sql = "SELECT * FROM images WHERE user='$mail'";
    $result = $dbh->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $result->fetchAll();
     print_r($arr);
    } catch (PDOException $e) {
        echo "Not connected: ". $e->getMessage();
    }

    if(isset($_POST['comBut']))
    {
        $comment = $_POST['bio']."<br>";
        
        
        $sql = "SELECT * FROM users WHERE email='$mail'";
        $result = $dbh->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $arra = $result->fetch();
        $arra = $arra['Username'];
        // $msg = "image uploaded";
        // $css_class = "alert-success";
        
        $email = $_SESSION['email'];
        $token = $_SESSION['token'];
        $image_id = $_GET['image_id'];
        try {
            echo "button clicked";
        // $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO comments (Username, comment	, image_id) VALUES ('$arra', '$comment', '$image_id');";
        $dbh->exec($sql);
        } catch (PDOExeption $e) {
            echo "Not connected: ". $e->getMessage();
        }

        // try {
        //     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $sql = "SELECT * FROM comments WHERE image_id='$image_id'";
        //     $result = $dbh->query($sql);
        //     $result->setFetchMode(PDO::FETCH_ASSOC);
        //     $commen = $result->fetchAll();
        //     //print_r($commen);
        //     foreach($commen as $key => $value) {
        //         echo $value['Username'] . " --> " . $value['comment'] . "<br />";
        //     }
        // } catch (PDOExeption $e) {
        //     echo "Not connected: ". $e->getMessage();
        // }
    }




?>