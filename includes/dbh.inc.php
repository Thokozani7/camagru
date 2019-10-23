<?php


   $DB_NAME = "camagru";
   $DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
   $DB_DSN1 = "mysql:host=localhost";
   $DB_USER = "root";
   $DB_PASSWORD = "123456789";


// class Dbh {
//     private $servername;
//     private $username;
//     private $password;
//     private $dbname;
//     private $charset;
    
//     public function connect() {
//         $this->servername = "localhost";
//         $this->username = "root";
//         $this->password = "123456789";
//         $this->dbname = "camagru";
//         $this->charset = "utf8mb4";

//         try {
//             $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
//             $pdo = new PDO($dsn, $this->username, $this->password);
//             $pdo->setAttribute(POD::ATTR_ERRMODE, POD::ERRMODE_EXCEPTION);
//             echo "Connection created: ";
//             return $pdo;
//         }
//         catch (PDOException $e)
//         {
//             echo "Connection Failed: ".$e->getMessage();
//         }
//     }
// }
?>