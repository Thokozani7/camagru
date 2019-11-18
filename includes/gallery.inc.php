<?php

ini_set(‘display_errors’, 1);
ini_set(‘display_startup_errors’, 1);
error_reporting(E_ALL);

include "../config/database.php";
session_start();
// $msg = "";
// $css_class = "";
$page = $_GET['page'];
// $perPage = ($page > 1) ? (($page * 2) - 1) : 2;
$perPage = 5;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
// echo $start;

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mail = $_SESSION['email'];
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM images 
    LIMIT {$perPage} OFFSET {$start} ";
    $result = $dbh->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $result->fetchAll();
    $tot = $dbh->query("SELECT FOUND_ROWS() as total")->fetch()['total'];

    $pages = ceil($tot / $perPage);
    // var_dump($tot->fetch());
    // print_r($arr);
    // header("location: gallery.php");

    } catch (PDOException $e) {
        echo "Not connected: ". $e->getMessage();
    }



    //works when comment button is clicked
     if(isset($_POST['comBut']))
    {
        $comment =htmlspecialchars($_POST['bio']);
        
        
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
        if (!empty($comment))
        {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO comments (Username, comment	, image_id) VALUES ('$arra', '$comment', '$image_id');";
            $dbh->exec($sql);

            if ($_SESSION['notif'] == 1)
            {
                   $sql = "SELECT * FROM images WHERE image_id='$image_id'";
                   $results = $dbh->query($sql);
                   $results->setFetchMode(PDO::FETCH_ASSOC);
                   echo "<br>";
                   echo "<br>";
                   echo "<br>";
                   echo "<br>";
                   $results = $results->fetch();

                   $to = $results['user'];
                   $subject = "Post notification";
                   $message = "Someone commented on your post";
                   $headers = "From: camagru_CEO@mailseo.net \r\n";
                   $headers .= "MIME-Version: 1.0" . "\r\n";
                   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                   mail($to,$subject,$message,$headers);
            }
        }
         header ("Location: ../gallery.php");
        } catch (PDOExeption $e) {
            echo "Not connected: ". $e->getMessage();
        } 

        header("Location: ../gallery.php");
    }




?>

<!-- 3,root, sofar39230@hide-mail.net, e4eaec7b2fddafb3e6903f9f389f1f3da431f475, ad615638ca8476092004,1 , 1 -->
<!-- 3,root, sofar39230@hide-mail.net, e4eaec7b2fddafb3e6903f9f389f1f3da431f475, ad615638ca8476092004,1 , 1 -->
<!-- 3,root, sofar39230@hide-mail.net, e4eaec7b2fddafb3e6903f9f389f1f3da431f475, ad615638ca8476092004,1 , 1 -->