<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="includes/profile.inc.php" method="POST">
    <div>
    <div style="background-color: blue; border-radius: 50%; width: 200px; height: 200px;">
        <!-- <p>hello</p> -->
        </div>
<input type="file" name="fileToUpload" value=""> <input type="submit" name="upload" value="upload">
<br>
        <label class="profileImage">
  Profile Image
</label>
<hr>
<br>
 <div> Username: <br> <?php echo $_SESSION['username'] ?> <input type="submit" name="username" value="edit"></div>
 <br>
 <div> Email: <br> <?php echo $_SESSION['email'] ?> <input type="submit" name="email" value="edit"></div>
 
 <br>
 <div> Reset password: <br> ********** <input type="submit" name="pass" value="edit"></div>
</div></form>

</body></html>