<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);

    $db->login2($gebruikersnaam, $wachtwoord);
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
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">

        <form method="POST"><br><br>
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam"   class="form-control form-control-lg" ><br>
            <input type="password" name="wachtwoord" placeholder="wachtwoord" class="form-control form-control-lg"><br>
            <input type="submit"  class="btn btn-info btn-lg btn-block" ><br>
        </form>

        <form action="klant_register.php">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                </form>

    </div>
    </div>
    </div>
</div>
  
</body>
</html>