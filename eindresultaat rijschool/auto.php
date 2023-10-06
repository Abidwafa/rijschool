<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();


session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        
        $sql = "INSERT INTO autos VALUES (:autoID, :auto_merk, :auto_type, :kenteken, :beschikbaar, :onderhoud)";
        $placeholders = [
            'autoID' => null,
            'auto_merk' => $_POST['auto_merk'],
            'auto_type' => $_POST['auto_type'],
            'kenteken' => $_POST['kenteken'],
            'beschikbaar' => $_POST['beschikbaar'],
            'onderhoud' => $_POST['onderhoud'],
        ];
        $db->insert($sql,$placeholders);
        echo "<script>alert('Inserted successfully')</script>";
    }catch (\Exception $e) {
        echo $e->getMessage();
    }
}

$sqlautos = "Select * from autos";
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
<div class="container-fluid col-md-8 h-100">
    <div class="row justify-content-center align-items-center h-100">
    <div class="form-group">
    <h1 class="display-4">Voeg Auto Toe</h1><br>
<form method="POST" enctype="multipart/form-data">
        <input type="text" name="auto_merk" placeholder="auto_merk"  class="form-control form-control-lg" ><br>
        <input type="text" name="auto_type" placeholder="auto_type"class="form-control form-control-lg" ><br>
        <input type="text" name="kenteken" placeholder="kenteken"class="form-control form-control-lg" ><br>
        <input type="text" name="beschikbaar" placeholder="beschikbaar"class="form-control form-control-lg" ><br>
        <input type="text" name="onderhoud" placeholder="onderhoud"class="form-control form-control-lg" ><br>
        <input type="submit"  class="btn btn-info btn-lg btn-block"><br><br>
    </form>

    </div>
    </div>
    </div>
</div>

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
         
         



         <td><a class="btn btn-success btn-lg btn-block" href="edit_auto.php?autoID=
         <?php echo trim($rows['autoID']);?> 
         &auto_merk=<?php echo trim($rows['auto_merk']);?>
         &auto_type=<?php echo trim($rows['auto_type']);?>
         &kenteken=<?php echo trim($rows['kenteken']);?>
         &beschikbaar=<?php echo trim($rows['beschikbaar']);?>
         &onderhoud=<?php echo trim($rows['onderhoud']);?>
         ">Edit</a></td>
         <td><a class="btn btn-success btn-lg btn-block" href="delete_auto.php?autoID=<?php echo $rows['autoID'];?>">Delete</a></td>

       
    </tr>
     <?php }} ?>
   </table>
             <br>

   <a  class="btn btn-info btn-lg btn-block" href="admin.php">Terug naar Admin</a>
   <a  class="btn btn-danger btn-lg btn-block" href="logout.php">Logout</a>
   <br><br>


</body>
</html>