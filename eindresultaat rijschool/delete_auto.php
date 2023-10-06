<?php

include 'db.php';
$db = new Database();

$autoID = $_GET['autoID'];

$sql = "DELETE FROM autos WHERE autoID=:autoID";
$placeholders = [
    'autoID' => $autoID
];
 $db->delete($sql, $placeholders);
 header("Location: auto.php")


?>