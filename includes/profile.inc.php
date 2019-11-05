<?php

include_once "dbh.inc.php";
session_start();
$email = $_SESSION['email'];

if(isset($_POST['upload']))
{
    echo "<pre>",print_r($_POST),"<pre>";
    die();
}
if(isset($_POST['username']))
{
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    $results = $dbh->query($sql);
    $results->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $results->fetch();
    $key = $arr['token'];
    header ("Location: ../update.php?mode=username");
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
    header ("Location: ../update.php?mode=email");
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