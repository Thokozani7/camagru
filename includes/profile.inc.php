<?php

include_once "dbh.inc.php";

if(isset($_POST['upload']))
{
    echo "<pre>",print_r($_POST),"<pre>";
    die();
}
if(isset($_POST['upload']))
{
    echo "<pre>",print_r($_POST),"<pre>";
    die();
}
if(isset($_POST['upload']))
{
    echo "<pre>",print_r($_POST),"<pre>";
    die();
}
if(isset($_POST['pass']))
{
    $email = $_POST['email'];
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    $results = $dbh->query($sql);
    $results->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $results->fetch();
    echo "<pre>",print_r(),"<pre>";
    die();
}
?>