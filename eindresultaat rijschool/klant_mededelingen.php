<!DOCTYPE html>
<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:klant_login.php");
}

if(isset($_GET)) {
    $sql = "SELECT * FROM l_mededelingen";
    $result = $db->select($sql);
} else {
    header("location:klant_admin.php");
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><br><br><br>
<div class="mededeligen container-fluid col-md-6">
<?php
    if(!is_null($result))
    {
        foreach($result as $rows) { ?>
        <div class="card mb-1">
            <div class="card-header"><h5><?php echo $rows['titel'] ?></h5></div>
            <div class="card-body"><p><?php echo $rows['inhoud'] ?></p></div>
        </div>
        <?php }
    }
?>
</div>
<a  class="btn btn-info btn-lg btn-block container-fluid col-md-6" href="klant.php">Terug naar leerling omgeving</a><br>
</body>