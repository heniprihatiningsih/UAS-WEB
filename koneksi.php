<?php


session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "UAS";

try {
    $conn = new PDO("mysql:host=$host; dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}
