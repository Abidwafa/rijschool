<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

session_start();

if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:login_klant.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><br><br><br>
<div class="container-fluid col-md-10">
<h1><h1>Welkom bij de klant pagina, u bent ingelogd</h1></h1><br>

<a  class="btn btn-info btn-lg btn-block" href="klant_mededelingen.php">Bekijk mededelingen bedoeld voor jou</a><br>
<a  class="btn btn-info btn-lg btn-block" href="inplannen.php">Lessen overzicht en inplannen</a><br>
<a  class="btn btn-danger btn-lg btn-block" href="klant_logout.php">Logout</a>
</body>
</html>