<?php

include_once "../config/database.php";
include_once "account.php";
// $_SESSION
session_start();
$errors = array();
$username = "";
$email = "";

if (isset($_POST['submit'] ))
{
    $username = htmlspecialchars($_POST["username"]);
    $email = $_POST["email"];
    $password = $_POST["password"];

    //  echo $username;
    //  echo $email;
    // if($username == NULL|| $email == NULL || $password == NULL)
    // return ;
    // if($username != NULL|| $email != NULL || $password != NULL)
    // header("Location: ../register.html?already=signedin");
    if (empty($username))
    $errors["username"] = "Username required";
    if (empty($email))
    $errors["email"] = "E-mail required";
    if (empty($password))
    $errors["password"] = "Password required";

    // $_SESSION["username"] = $username;
    // $_SESSION["email"] = $email;

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $dbh->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $result->fetch();

   // $result = $dbh->get_result();
    $user_count= count($arr);
     //print_r($arr);
    //  echo $user_count;
     
     if($user_count > 1)
     $errors["email"] = "E-mail is already in use.";
     
     //password error handling
     if (strlen($password) > 30 || strlen($password) < 5) {
         array_push($errors, Constants::$passwordLength);
        //  echo Constants::$passwordLength;
 
     }

     if (!preg_match("/[^A-Za-z0-9]/", $password)) {
         array_push($errors, Constants::$passwordNotAlphanumeric);
        //  echo Constants::$passwordNotAlphanumeric;
        //  return;
     }

    if(count($errors) === 0)
    {
        $token = bin2hex(random_bytes(50));
        $token = substr($token, 0, 20);
        $varified = 0;

        include "../config/root.php";
        $dir = DIR;

        $password = SHA1($password);
        $sql = "INSERT INTO users (Username, email, varified, token, notif, passwd) VALUES ('$username', '$email', '$varified', '$token', '1', '$password');";
        $dbh->exec($sql);

        $to = $email;
        $subject = "E-mail varification";
        $message = "<a href='http://127.0.0.1:8081/$dir/varified.php?token=$token'>Varify account </a>";
        $headers = "From: camagru_CEO@mailseo.net \r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);

        
        // echo var_dump(mail($to, $subject, $message, $headers));
        // echo $dbh->execute();

        $link = "A varification link has been sent to your email account. Please click on the link that has just been sent
        to your email account that you have entered to varify your email.";

        //    header("Location: ../login.php");
        echo $link;
        echo '<br><a href="../login.php"><input type="submit" name="submit" value="submit" class="btn btn-primary"></a>';
        if($dbh->execute()) {
            echo "hello";
            $link = "Please verify your E-mail";
            header("Location: ../login.php");
            exit();
        } else {
            $errors['db_error'] = "Database error: failed to register";
        }
    }
}
catch (PDOException $e) {
    echo "Not connected: ". $e->getMessage();
}


$_SESSION["errors"] = $errors;

    header("Location: ../register.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <p> 
    <!-- <a href="../login.php">log-in</a> -->
    </p>
    </body>
</html>