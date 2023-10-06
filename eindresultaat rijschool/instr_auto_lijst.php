<?php
include 'db.php';
include 'nav.php';
include 'script.php';
$db = new Database();


session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:login_instructeur.php");
}

$sqlautos = "SELECT * FROM autos";
$result = $db->select($sqlautos)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<br><br><br>
   <h1 >Alle auto</h1>
   <table class="table table-striped">
    <tr>
        <th>auto</th>
        <th>auto_merk</th>
        <th>auto_type</th>
        <th>kenteken</th>
        <th>beschikbaar</th>
        <td>onderhoud</td>
        <th colspan="2">Actie</th>
    </tr>

    <tr>
        <?php 
        if(!is_null($result)) {
        foreach ($result as $rows) {?>
         <td><?php echo $rows['autoID'] ?></td>
         <td><?php echo $rows['auto_merk'] ?></td>
         <td><?php echo $rows['auto_type'] ?></td>
         <td><?php echo $rows['kenteken'] ?></td>
         <td><?php echo $rows['beschikbaar'] ?></td>
         <td><?php echo $rows['onderhoud'] ?></td>

         <td><a class="btn btn-success btn-lg btn-block" href="instr_comment_auto.php?autoID=
         <?php echo trim($rows['autoID']);?> 
         &auto_merk=<?php echo trim($rows['auto_merk']);?>
         &auto_type=<?php echo trim($rows['auto_type']);?>
         &kenteken=<?php echo trim($rows['kenteken']);?>
         &beschikbaar=<?php echo trim($rows['beschikbaar']);?>
         &onderhoud=<?php echo trim($rows['onderhoud']);?>
         ">Comment</a></td>

       
    </tr>
     <?php }} ?>
   </table>
             <br>


</body>
</html>