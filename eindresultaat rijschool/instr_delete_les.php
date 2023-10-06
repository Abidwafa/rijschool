<?php

include 'db.php';
$db = new Database();

$lesID = $_GET['lesID'];

$sql = "DELETE FROM lessen WHERE lesID=:lesID";
$placeholders = [
    'lesID' => $lesID
];
 $db->delete($sql, $placeholders);
 header("Location: lesrooster.php")


?>