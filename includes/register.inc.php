<?php

include_once "dbh.inc.php";
// $_SESSION
session_start();
$errors = array();
$username = "";
$email = "";

if (isset($_POST['submit'] ))
{
    $username = $_POST["username"];
     $email = $_POST["email"];
     $password = $_POST["password"];

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

    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    // echo $username."\n";
    // echo $email."\n";
    // echo $password."\n";
    // foreach ($errors as $value)
    // {
    //     echo $value."<br>";
    // }


// try{
// $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $password = SHA1($password);
// $sql = "INSERT INTO users (Username, email, passwd) VALUES ('$username', '$email', '$password');";
// $dbh->exec($sql);
// echo "Added to database!!";
// $_SESSION["message"] = "You are logged in";
// $_SESSION["username"] = $username;
// header("Location: ../login.html");
// // $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
// // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// // $sql = "DELETE FROM users";
// // $dbh->exec($sql);
// $dbh->close();
// }
// catch (PDOException $e) {
//     echo "Not connected: ". $e->getMessage();
// }
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
     
    //  echo count($errors);
 
    if(count($errors) === 0)
    {
        $token = bin2hex(random_bytes(50));
        $token = substr($token, 0, 20);
        $varified = 0;

        $password = SHA1($password);
        $sql = "INSERT INTO users (Username, email, varified, token, passwd) VALUES ('$username', '$email', '$varified', '$token', '$password');";
        $dbh->exec($sql);

        $to = $email;
        $subject = "E-mail varification";
        $message = "<a href='http://127.0.0.1:8081/camagru0/varified.php?token=$token'>Register account </a>";
        $headers = "From: cotekiy@mailseo.net \r\n";
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