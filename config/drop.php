<?php 
require_once '../includes/dbh.inc.php';

try {
$dbh = new PDO($DB_DSN1, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DROP DATABASE camagru;";
$dbh->exec($sql);
}
catch(PDOException $e) {
    echo "Database not deleted: ". $e->getMessage();
}
?>