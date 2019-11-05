<?php
include_once "dbh.inc.php";
session_start();

if(isset($_POST['log_submit']))
{
    try{
        $_SESSION['email'] = $_POST['email'];
        $email = $_POST['email'];
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE email = '$email' ;";
        $results = $dbh->query($sql);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $results->fetch();

       
        print_r($arr);
        
        if ($arr['passwd'] == SHA1($_POST['password']) && !empty($arr) && $arr['varified'] == 1)
        {
            // echo "<br>";
            // echo $email."<br>";
            echo $_SESSION['email'] = $email;
            echo $_SESSION['username'] = $arr['Username'];
            echo $_SESSION['token'] = $arr['token'];
            // echo "<br>".$_SESSION['username']."<br>";
            echo "<br>";
            echo "You are now logged in.";
            header ("Location: ../index.php");
        }
        else {
            header ("Location: ../login.php?error_code=Incorrect password or E-mail");
        }
    } catch (PDOException $e)
    {
        echo "Not logged in: ". $e->getMessage();
    }
    // onclick="alert('An E-mail has been sent, click on the link to reset your password')"
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
    </body>
</html>