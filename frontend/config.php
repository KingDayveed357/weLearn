<?php
session_start();
$host = "local host";
$user = "root";
$pass = "";
$dbname = "portal";

//$conn = new mysqli ( $host, $user, $pass , $dbname )
$conn = new mysqli ("localhost", "root", "", "portal");

function cleaninput($data){
    GLOBAL $conn;
    $data = trim($data);
    $data = strip_tags($data);
    $data = htmlentities($data);
    $data = $conn->real_escape_string($data);
    return $data;
}


?>