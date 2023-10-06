<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
    <br><br><br>
    <div class="container-fluid col-md-10">
    <h1>Welkom rijschoolhouder, u bent ingelogd</h1>
    <br>
    <a  class="btn btn-info btn-lg btn-block" href="auto.php">hier kan je een auto toevoegen en verwijderen </a><br>
    <a  class="btn btn-info btn-lg btn-block" href="add_auto_rijschoolhouder.php">Auto toevoegen aan een instructeur</a><br>
    <a  class="btn btn-info btn-lg btn-block" href="admin_maak_mededeling.php">Maak mededeling voor instructeur</a><br>
    
    <form action="instructeur_register.php">
                    <button type="submit" class="btn btn-info btn-lg btn-block">Registreer instructeur</button>
                </form><br>



<a  class="btn btn-danger btn-lg btn-block" href="logout.php">Logout</a><br>
</div>
</body>
</html>

