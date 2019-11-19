<?php

session_start();
 if(isset($_SESSION['email'])) {
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="back_or">
        <div class="navbar navbar-expand-lg navbar-light bg-light">       
                <a href="./index.php" >Home</a> |     
                <a href="gallery.php">Gallery</a> |
                <a href="my_uploads.php">My uploads</a> |
                <a href="profile.php">Profile</a> |
                <a href="includes/logout.inc.php">Logout</a> |
        
        </div>
<div class="tk_form">
    <form  action="includes/profile.inc.php" method="POST">
    <div>
    <!-- <div style="background-color: blue; border-radius: 50%; width: 200px; height: 200px;"> -->
        <!-- <p>hello</p> -->
        </div>
<!-- <input type="file" name="fileToUpload" value=""> <input type="submit" name="upload" value="upload"> -->
<br>
        <label class="userprofile">
  User Profile
</label>
<hr>
<br>
 <div> Username: <br> <?php echo $_SESSION['username'] ?> <input type="submit" name="username" value="edit"></div>
 <br>
 <div> Email: <br> <?php echo $_SESSION['email'] ?> <input type="submit" name="email" value="edit"></div>
 
 <br>
 <div> Update password: <br> ********** <input type="submit" name="pass" value="edit"></div>

 <br>
 </form>
 <div> Notification alert: <br> 
 <form action="includes/notif_switch.php" method="POST">
    <label class="switch">

      <input type="checkbox" name="checkbox"
        <?php
            if ($_SESSION['notif'] == 1)
            {
                echo "checked";
            }
            else {
                echo "unchecked";
            }
        ?>
      >
      <span class="slider round"></span>
    </label>
      <input type="submit" name="save" value="save">
</form>
</div>

</body></html>

<?php } ?>