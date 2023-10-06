<!DOCTYPE html>
<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:login_instructeur.php");
}

if(isset($_GET)) {
    $sql = "SELECT instructeurs.gebruikersnaam, autos.auto_merk, autos.auto_type
    FROM instructeurs 
    INNER JOIN autos ON instructeurs.autoID = autos.autoID";
    $result = $db->select($sql);
} else {
    header("location:instructeur_admin.php");
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
<div class="instructeur-autos container col-sm-6">
<?php
    if(!is_null($result))
    {
        foreach($result as $rows) { ?>
        <div class="card mb-1">
            <div class="card-header"><h5><?php echo $rows['gebruikersnaam'] ?></h5></div>
            <div class="card-body"><p><?php echo $rows['auto_merk'] ?> <?php echo $rows['auto_type'] ?></p></div>
        </div>
        <?php }
    }
?>
</div>
</body>