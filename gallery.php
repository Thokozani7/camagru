<?php
include_once "includes/gallery.inc.php";

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
    <input type="submit" value="likes">
    <!-- <textarea name="bio"  cols="100" rows="5"></textarea> -->
    </div>


    <div align="right">
    <form action="includes/gallery.inc.php?image_id=<?php echo $value['image_id'] ?>" method="POST"> 
        <input type="submit" name="comBut" value="comment">
        <textarea name="bio"  cols="100" rows="2"></textarea>
    </form>
    </div>
    
    
    </div>
    <div class="displayComments">
        <div class="per_comm">
            <div class="user">Thokozani</div>
            <hr style='width: 80px;'>
            <div class="comm">fghjkl</div>
            <br>
        </div>
    </div>

    <?php endforeach; ?>

</body>
</html>
