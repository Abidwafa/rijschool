<?php
include 'db.php';
include "script.php";
include "nav.php";

$db = new Database();


session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:instructeur_admin.php");
}

$sqllessen = "Select * from lessen";
$result = $db->select($sqllessen)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessen </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
<div class="container-fluid col-md-11 h-100">
   <h1 >Alle lessen</h1>
   <table class="table table-striped">
    <tr>
        <th>lesnummer</th>
        <th>ophaallocatie</th>
        <th>datum</th>  
        <th>starttijd</th>
        <th>eindtijd</th>
        <th>doel</th>
        <th>opmerking</th>
    </tr>

    <tr>
        <?php 
        if(!is_null($result)) {
        foreach ($result as $rows) {?>
         <td><?php echo $rows['lesID'] ?></td>
         <td><?php echo $rows['ophaallocatie'] ?></td>
         <td><?php echo $rows['datum'] ?></td>
         <td><?php echo $rows['starttijd'] ?></td>
         <td><?php echo $rows['eindtijd'] ?></td>
         <td><?php echo $rows['doel'] ?></td>
         <td><?php echo $rows['onderwerpen'] ?></td>
         

         <td><a class="btn btn-success btn-lg btn-block" href="instr_edit_les.php?lesID=
         <?php echo trim($rows['lesID']);?> 
         &ophaallocatie=<?php echo trim($rows['ophaallocatie']);?>
         &datum=<?php echo trim($rows['datum']);?>
         &starttijd=<?php echo trim($rows['starttijd']);?>
         &eindtijd=<?php echo trim($rows['eindtijd']);?>
         &doel=<?php echo trim($rows['doel']);?>
         ">Aanpassen</a></td>

         <td><a class="btn btn-success btn-lg btn-block" href="instr_les_opmerking.php?lesID=
         <?php echo trim($rows['lesID']);?> 
         &onderwerpen=<?php echo trim($rows['onderwerpen']);?>
         ">Opmerking</a></td>

         <td><a class="btn btn-success btn-lg btn-block" href="instr_delete_les.php?lesID=<?php echo $rows['lesID'];?>">Verwijderen</a></td>
    </tr>
    
     <?php }} ?>
   </table>
             <br>
   <br><br>
</div>

</body>
</html>