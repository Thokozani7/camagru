<?php
include_once "../config/database.php";
session_start();

if(isset($_POST['validate']))
{
    try{
        // $_SESSION['email_used_for_updating'] = $_POST['email'];
        $email = $_POST['email'];
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM users WHERE email = '$email' ;";
        $results = $dbh->query($sql);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $arr = $results->fetch();
        // echo $email."<br>";
        print_r($arr);
        $token = $arr['token'];
        if (!empty($arr))
        {
            header ("Location: ../forgot.php?result=E-mail has been sent :)))");

            $to = $email;
            $subject = "E-mail varification";
            $message = "<a href='http://127.0.0.1:8081/camagru0/reset_password.php?key=$token'>Password reset</a>";
            $headers = "From: cotekiy@mailseo.net \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            mail($to,$subject,$message,$headers);
            // header ("Location: ../update_detail.php");
        }
        else {
            header ("Location: ../forgot.php?result=E-mail address does not exist :(((");
        }
    } catch (PDOException $e)
    {
        echo "Couldn't Connect: ". $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forgot password</title>
    </head>
    <body>     
    </body>
</html>