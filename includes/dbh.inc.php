<?php


   $DB_NAME = "tcamagru";
   $DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
   $DB_DSN1 = "mysql:host=localhost";
   $DB_USER = "root";
   $DB_PASSWORD = "123456789";


// class Dbh {
//     private $DB_NAME;
//     private $DB_DSN;
//     private $DB_DSN1;
//     private $DB_USER;
//     private $DB_PASSWORD;

//     public function connect() {
//         $this->DB_NAME = "camagru";
//         $this->DB_DSN = "mysql:host=localhost;dbname=".$DB_NAME;
//         $this->DB_DSN1 = "mysql:host=localhost";
//         $this->DB_USER = "root";
//         $this->DB_PASSWORD = "123456789";

//         try {
// //             $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
//             // $pdo = new PDO($dsn, $this->username, $this->password);
//             $dbh = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
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

// $object = new Dbh();
// $object->connect();
?>