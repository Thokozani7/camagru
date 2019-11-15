<?php

ini_set(‘display_errors’, 1);
ini_set(‘display_startup_errors’, 1);
error_reporting(E_ALL);

include "includes/dbh.inc.php";
include "includes/gallery.inc.php";


// print_r($arr);
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
    <?php if(isset($_SESSION['email'])) { ?>
        <a href="./index.php" >Home</a>
<?php } ?>
        <h2 align="center">Gallery</h2>
        <hr>
    </div>

    <br>
    <br>
    <br>
        <?php foreach($arr as $value):?>
            <div  class="col-md-5">
                <!-- <img src="img/placeholder.jpeg" class="posted_pic"> -->
                <?php
                    $user = $value['user'];
                    $query =$dbh->prepare("SELECT * FROM users WHERE email= '$user' ;");
                    $query->execute();
                    $check = $query->fetch();
                    echo strtoupper($check['Username']);
                ?>
            <hr>
            <img src="uploads/<?php echo $value['image']; ?>"  class="posted_pic">

<!-- sending the like to the database-->
    <div align="right">
    <?php if(isset($_SESSION['email'])) { ?>
        <form action="includes/likes.php" method="POST">
            <input type="submit"    name="like_but" value="likes"
            <?php
            
                $user = $_SESSION['email'];
                $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $dbh->prepare("SELECT * FROM likes WHERE image= '$img' AND user= '$user' ;");
                $query->execute();
                echo $query->rowcount();

                if ($query->rowcount() >= 6) {
                    echo 'style="background-color: skyblue;';
                    }
            ?>
            >
    <?php }else { ?>
        <a href="./login.php"> <button style="padding: 2px;">like</button> </a>
    <?php } ?>
            <input type="hidden"    name="post_id"  value="<?php echo   $value['image_id']; ?>">
            <input type="hidden"    name="image"    value="<?php echo   $value['image']; ?>">
            <input type="hidden"    name="username" value="<?php echo   $_SESSION['email']; ?>">
        </form>
        <?php
        $img = $value['image'];
            $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $dbh->prepare("SELECT * FROM likes WHERE image= '$img' ;");
            $query->execute();
            echo $query->rowcount();
        ?>
    </div>

<!--... sending image_id to db  as well as comment to be saved on the database-->
    <div align="right">
    
        <?php if(isset($_SESSION['email'])) { ?>
            <form action="includes/gallery.inc.php?image_id=<?php echo $value['image_id'] ?>" method="POST">
                <input      type="submit" name="comBut" value="comment">
                <textarea                 name="bio"  cols="100" rows="2"></textarea>
            </form>
        <?php }else { ?>
            
                <a href="./login.php"> <button style="padding: 2px;">comment</button> </a>
                <textarea                 name="bio"  cols="100" rows="2"></textarea>
            
        <?php } ?>
    </div>


<!-- selecting all rows concerning this image then echo results in comment section -->
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

    <?php

    // if(isset($_GET['page']))
    //     echo $page =(int)$_GET['page'];
    // else
    //     echo $page =1;

    for($x = 1; $x <= $pages; $x++){?>
        <a href="?page=<?php echo $x; ?>" <?php if($pages === $x){ echo 'class="selected"'; } ?> ><?php echo $x; ?></a>
    <?php
    }

    // if(isset($_GET['per-page']) && $_GET['per-page'] <= 50)
    // {
    //     echo $perPage = (int)$_GET['per-page'];
    // }
    // else
    // echo  $perPage = 5;
    // header("Location: includes/gallery.inc.php?page=$page");
    

    ?>

    <?php
    
    $query = $dbh->prepare("SELECT * FROM images WHERE image= '$img' ;");


    ?>

    <div id="commentsconatina">
    <div>

    <script>

    </script>

</body>
</html>
