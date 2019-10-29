<?php 
try {
$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DROP DATABASE camagru";
$result = $dbh->query($sql);
}
catch(PDOException $e) {
    echo "Database not deleted: ". $e->getMessage();
}
?>