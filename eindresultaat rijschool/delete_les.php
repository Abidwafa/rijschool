<?php

include 'db.php';
$db = new Database();

$lesID = $_GET['lesID'];

$sql = "DELETE FROM lessen WHERE lesID=:lesID";
$placeholders = [
    'lesID' => $lesID
];
 $db->delete($sql, $placeholders);
 

$sql = "UPDATE lessen SET lesID = lesID - 1 WHERE lesID > (SELECT lesID FROM lessen WHERE lesID=:lesID)";
$placeholders = [
    'lesID' => $lesID
];
$db->update($sql, $placeholders);

header("Location: inplannen.php");

?>