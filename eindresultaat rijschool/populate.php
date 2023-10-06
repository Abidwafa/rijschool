<?php
include 'db.php';
$db = new Database();


$sql = "INSERT INTO rijschoolhouder VALUES(:rijschoolhouderID,:gebruikersnaam,:wachtwoord)";
$placeholder = [
    'rijschoolhouderID'=> NULL,
    'gebruikersnaam'=> 'admin',
    'wachtwoord'=> password_hash('admin', PASSWORD_DEFAULT)
];
$db->insert($sql,$placeholder)

?>