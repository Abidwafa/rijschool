<?php

use LDAP\Result;

include 'db.php';
include "script.php";
include "nav.php";

$db = new Database();


$sql = "SELECT lessen.lesID  as lesID, instructeurs.gebruikersnaam as gebruikersnaam, klanten.naam as naam, autos.auto_merk as auto_merk, 
autos.auto_type as auto_type, lessen.ophaallocatie  as ophaallocatie, 
lessen.datum  as datum, lessen.starttijd  as starttijd, lessen.eindtijd  as eindtijd,
lessen.doel	  as doel, lessen.onderwerpen as onderwerpen	
FROM lessen 
INNER JOIN instructeurs ON lessen.instructeurID = instructeurs.instructeurID
INNER JOIN klanten ON lessen.klantID = klanten.klantID
INNER JOIN autos ON lessen.autoID = autos.autoID
WHERE lessen.datum = CURDATE()";

$result = $db->select($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dagrooster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
   <h1>dagrooster</h1>
   <table class="table table-striped">
    <tr>
        <th>lesID</th>
        <th>instructeur</th>
        <th>klant</th>
        <th>auto</th>
        <th>ophaallocatie</th>
        <th>datum</th>
        <th>starttijd</th>
        <th>eindtijd</th>
        <th>doel</th>
        <th>onderwerpen</th>
    </tr>

    <?php 
    if(!is_null($result)) {
        foreach ($result as $row) {?>
            <tr>
                <td><?php echo $row['lesID'] ?></td>
                <td><?php echo $row['gebruikersnaam'] ?></td>
                <td><?php echo $row['naam'] ?></td>
                <td><?php echo $row['auto_merk']." ".$row['auto_type'] ?></td>
                <td><?php echo $row['ophaallocatie'] ?></td>
                <td><?php echo date("l, j F Y", strtotime($row['datum'])) ?></td>
                <td><?php echo $row['starttijd'] ?></td>
                <td><?php echo $row['eindtijd'] ?></td>
                <td><?php echo $row['doel'] ?></td>
                <td><?php echo $row['onderwerpen'] ?></td>
    </tr>
     <?php }
     } ?>
   </table>
   
   <button class="btn btn-info btn-lg btn-block" onclick="window.print()"> Print this page</button>
   
</body>
</html>