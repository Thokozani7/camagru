<?php

include_once "dbh.inc.php";
$email = $_SESSION['email'];
session_start();

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
if(isset($_POST['email']))
{
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    $results = $dbh->query($sql);
    $results->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $results->fetch();
    $key = $arr['token'];
    header ("Location: ../update.php?key=$key");
    echo "<pre>",print_r($_POST),"<pre>";
    die();
}
if(isset($_POST['pass']))
{
    
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    $results = $dbh->query($sql);
    $results->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $results->fetch();
    $key = $arr['token'];
    header ("Location: ../reset_password.php?key=$key");
    echo "<pre>",print_r(),"<pre>";
    die();
}
?>