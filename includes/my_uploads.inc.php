<?php
include "dbh.inc.php";
session_start();
$msg = "";
$css_class = "";

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mail = $_SESSION['email'];
    $sql = "SELECT * FROM images WHERE user='$mail'";
    $result = $dbh->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $result->fetchAll();
    // print_r($arr);
    } catch (PDOException $e) {
        echo "Not connected: ". $e->getMessage();
    }

if (isset($_POST['pic_upload']))
{
    echo "<pre>",print_r($_FILES['pic_post']['name']),"</pre>";
    
    $profile_img_name = time() . '_' .$_FILES['pic_post']['name'];
    
    $target = "../uploads/". $profile_img_name;
    
    // echo "<pre>",print_r($_FILES['pic_post']['tmp_name']),"</pre>";
    // echo $target;
    // var_dump(move_uploaded_file($_FILES['pic_post']['tmp_name'], $target));
    if (move_uploaded_file($_FILES['pic_post']['tmp_name'], $target))
    {
        $msg = "image uploaded";
        $css_class = "alert-success";

        echo $email = $_SESSION['email'];
        echo $token = $_SESSION['token'];
        try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $sql = "INSERT INTO images (image, user, text) VALUES ('$profile_img_name', '$email', '$token');";
        $dbh->exec($sql);
        } catch (PDOExeption $e) {
            echo "Not connected: ". $e->getMessage;
        }

        header ("Location: ../my_uploads.php?msg=$msg&css_class=$css_class");
    } else {
        $msg = "failed to upload";
        $css_class = "alert-danger";
        header ("Location: ../my_uploads.php?msg=$msg&css_class=$css_class");
    }
}
?>