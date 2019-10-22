<?php

class User extends dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function getAllUser() {
        $sql = "SELECT * FROM User";
        $conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }
}
?>