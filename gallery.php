<?php
include_once "includes/gallery.inc.php";
include "includes/dbh.inc.php";

// echo "<br>";
// print_r($arr[0]['image_id']);


?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
    <div>
        <h2 align="center">Gallery</h2>
        <hr>
    </div>
    

    <br>
    <br>

    <br>
        <?php foreach($arr as $value):?>
    <div  class="col-md-5">
        <!-- <img src="img/placeholder.jpeg" class="posted_pic"> -->
        <?php echo $value['image']; ?>
        <img src="uploads/<?php echo $value['image']; ?>"  class="posted_pic">

    <div align="right">
        <form action="includes/likes.php" method="POST">
            <input type="submit" name="like_but" value="likes">
            <input type="hidden" name="post_id" value="<?php echo $value['image_id']; ?>">
            <input type="hidden" name="image" value="<?php echo $value['image']; ?>">
            <input type="hidden" name="username" value="<?php echo  $_SESSION['email']; ?>">
        </form>
    </div>


    <div align="right">
    <form action="includes/gallery.inc.php?image_id=<?php echo $value['image_id'] ?>" method="POST"> 
        <input type="submit" name="comBut" value="comment">
        <textarea name="bio"  cols="100" rows="2"></textarea>
    </form>
    </div>



<?php echo $value['image_id']; ?>
    <?php try {
    $image_id = $value['image_id'];
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM comments WHERE image_id='$image_id'";
    $result = $dbh->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $commen = $result->fetchAll();
    //print_r($commen);
    // foreach($commen as $key => $value) {
    //     echo $value['Username'] . " --> " . $value['comment'] . "<br />";
    // }
    } catch (PDOExeption $e) {
        echo "Not connected: ". $e->getMessage();
    } 
    ?>
    



    </div>
    <div class="displayComments">
        <div class="per_comm">
        <?php foreach($commen as $key => $value) { ?>
            <div class="user"><?php  echo $value['Username'] ; ?></div>
            <hr style='width: 80px;'>
            <div class="comm"><?php  echo $value['comment'] ; ?></div>
        <?php } ?>
            <br>
        </div>
    </div>

    <?php endforeach; ?>

    <div id="commentsconatina">
    <div>

    <script>

    </script>

</body>
</html>
