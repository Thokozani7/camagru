

<?php

include_once "../config/database.php";
session_start();

$email = $_SESSION['email'];
$token = $_SESSION['token'];

echo $_GET['email'];

if(isset($_POST['submit']))
{
    try {
            if(!empty($_POST['email']))
            {
                echo $email;
                $_SESSION['email'] = $_POST['email'];
                $newmail = $_POST['email'];
                $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// checking if an email exists
                $sql = "SELECT * FROM users WHERE email='$newmail' LIMIT 1";
                $result = $dbh->query($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $arr = $result->fetch();
            
                $user_count= count($arr);
                 
                 if($user_count > 1)
                 {
                     $errors["email"] = "E-mail is already in use.";
                     header ("Location: ../update.php?errors=E-mail is already in use.&mode=email");
                 } else {
                        $sql = "UPDATE users SET varified=0, email='$newmail' WHERE email = '$email' ;";
                        $dbh->exec($sql);
                        
                        $sql1 = "UPDATE likes SET user= '$newmail' WHERE user = '$email' ;";
                        $dbh->exec($sql1);

                        $sql2 = "UPDATE images SET user= '$newmail' WHERE user = '$email' ;";
                        $dbh->exec($sql2);


                        include "../config/root.php";
                        $dir = DIR;

                        $to = $newmail;
                        $subject = "E-mail varification";
                        $message = "<a href='http://127.0.0.1:8081/$dir/varified.php?token=$token'>Varify new account </a>";
                        $headers = "From: camagru_CEO@mailseo.net \r\n";
                        $headers .= "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        mail($to,$subject,$message,$headers);
                     echo "done to be used";
                    }

            } else if(!empty($_POST['username']))
                    {
                        $name = $_POST['username'];
                        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "UPDATE users SET Username= '$name' WHERE token='$token' ;";
                        $dbh->exec($sql);
                        $_SESSION['username'] = $name; //need to fix
                        header ("Location: ../profile.php");
                    }
        } catch (PDOException $e)
        {
            echo "Error: ". $e->getMessage();
        }
}
?>