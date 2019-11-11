<?php
    if (isset($_POST['like_but']))
    {
        $post_id  = $_POST['post_id'];
        $username = $_POST['username'];
        echo $image = $_POST['image'];
        require_once("dbh.inc.php");
        //echo $post_id . " <br>" . $username;
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT * FROM `likes` WHERE image_id='$post_id' AND user='$username'");
        $query->execute();
        if($query->rowCount() >= 1) {
            echo "Liked Before";
            //DELETE FROM `likes` WHERE `likes`.`id` = 1;
            $query = $dbh->prepare("DELETE FROM `likes` WHERE `likes`.`image_id`='$post_id' AND user='$username' ; ");
            $query->execute();
            header("Location: ../gallery.php");
        }   else {
        
            $query = $dbh->prepare("INSERT INTO `likes` (`image_id`, `user`, `image`) VALUES ('$post_id', '$username', '$image')");
            $query->execute();
            echo "Post Liked";
            header("Location: ../gallery.php");
        }
    
        // print_r($_POST);
    }
?>