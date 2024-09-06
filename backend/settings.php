<?php 

$query = $conn->prepare("SELECT * FROM settings");
$query->execute();
$result = $query->get_result();
$settings = $result->fetch_assoc();