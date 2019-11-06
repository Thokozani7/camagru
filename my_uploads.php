<?php
include "includes/my_uploads.inc.php";

include "includes/dbh.inc.php";
session_start();

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

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
    <div>
        <h2 align="center">My_uploads</h2>
        <hr>
    </div>
    <br>
    <br>
    <form action="includes/my_uploads.inc.php" method="POST" enctype="multipart/form-data">
    <!-- <textarea name="bio"  cols="30" rows="5"></textarea> -->

    <?php if(!empty($_GET['msg'])): ?>
    <div class="alert <?php echo $_GET['css_class']; ?>">
    <?php echo $_GET['msg']; ?>
    </div>
<?php endif; ?>


    <input type="file" name="pic_post">
    <input type="submit" name="pic_upload" value="post">
    </form>
    <br>
    <div  class="col-md-5">
        <img src="img/placeholder.jpeg" class="posted_pic">
        <?php foreach($arr as $value):?>
        <?php echo $value['image']; ?>
        <img src="uploads/<?php echo $value['image']; ?>"  class="posted_pic">
    <?php endforeach; ?>
    <div align="right"> 
    comments
    <textarea name="bio"  cols="100" rows="5"></textarea>
    </div>
    <div align="right"> 
    likes
    <!-- <textarea name="bio"  cols="100" rows="5"></textarea> -->
    </div>
    
</body>
</html>
