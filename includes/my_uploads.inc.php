<?php


$DB_NAME = "tcamagru";
$DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
$DB_DSN1 = "mysql:host=localhost";
$DB_USER = "root";
$DB_PASSWORD = "123456789";

try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo "Not connected: ". $e->getMessage();
}


session_start();
$msg = "";
$css_class = "";

try {
    
    $mail = $_SESSION['email'];

    // $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM images WHERE user='$mail' ORDER BY image_id DESC ; ";
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

    if (getimagesize($_FILES['pic_post']['tmp_name']))
    {
        move_uploaded_file($_FILES['pic_post']['tmp_name'], $target);
        $msg = "image uploaded";
        $css_class = "alert-success";

        echo $email = $_SESSION['email'];
        echo $token = $_SESSION['token'];
        try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $sql = "INSERT INTO images (image, user, text) VALUES ('$profile_img_name', '$email', '$token');";
        $dbh->exec($sql);
        } catch (PDOExeption $e) {
            echo "Not connected: ". $e->getMessage();
        }

        header ("Location: ../my_uploads.php?msg=$msg&css_class=$css_class");
    } else {
        $msg = "failed to upload";
        $css_class = "alert-danger";
        header ("Location: ../my_uploads.php?msg=$msg&css_class=$css_class");
    }
}
?>