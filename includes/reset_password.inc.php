<?php

include_once "../config/database.php";
// $_SESSION
session_start();
$errors = array();
$username = "";
$email = "";

if (isset($_POST['submit'] ))
{
        $password = $_POST["password"];
  
        echo $token = $_SESSION['key'];
        unset($_SESSION['key']);
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "SELECT * FROM users WHERE email='$before_update_email' LIMIT 1";
        // $result = $dbh->query($sql);
        // $result->setFetchMode(PDO::FETCH_ASSOC);
        // $arr = $result->fetch();

        // $user_count= count($arr);
        //  print_r($arr);
 

            // $token = bin2hex(random_bytes(50));
            // $token = substr($token, 0, 20);

            $password = SHA1($password);
            $sql =  "UPDATE users SET passwd='$password' WHERE token='$token'";
            $dbh->exec($sql);

            // echo var_dump(mail($to, $subject, $message, $headers));
            // echo $dbh->execute();

            $link = "Updated";

            //header("Location: ../login.php");
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
    catch (PDOException $e) {
        echo "Not connected: ". $e->getMessage();
    }


// $_SESSION["errors"] = $errors;
//     header("Location: ../register.php");
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