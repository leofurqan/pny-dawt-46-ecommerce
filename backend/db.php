<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sparklink";

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_errno) {
    die($conn->connect_error);
}