<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();


session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}

$today = date('Y-m-d');
$maxdate = date('Y-m-d', strtotime('+7 days'));

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "INSERT INTO lessen VALUES (:lesID, :instructeurID, :klantID, :autoID, :ophaallocatie, :datum, :starttijd, :eindtijd, :doel, :onderwerpen)";
        $placeholders = [
            'lesID' => null,
            'instructeurID' => null,
            'klantID' => null,
            'autoID' => null,
            'ophaallocatie' => $_POST['ophaallocatie'],
            'datum' => $_POST['datum'],
            'starttijd' => $_POST['starttijd'],
            'eindtijd' => $_POST['eindtijd'],
            'doel' => $_POST['doel'],
            'onderwerpen' => null
        ];
        $db->insert($sql,$placeholders);
        echo "<script>alert('Inserted successfully')</script>";
    }catch (\Exception $e) {
        echo $e->getMessage();
    }
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
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">Plan je les in</h1><br>
<form method="POST" enctype="multipart/form-data">
        <input type="text" name="ophaallocatie" placeholder="ophaallocatie"  class="form-control form-control-lg" required><br>
        <input type="date" name="datum" placeholder="datum" class="form-control form-control-lg" min="<?php echo $today;?>" max="<?php echo $maxdate; ?>" required><br>
        <input type="time" name="starttijd" placeholder="starttijd"class="form-control form-control-lg" value="08:00" min="08:00" max="17:00" step="3600" required><br>
        <input type="time" name="eindtijd" placeholder="eindtijd"class="form-control form-control-lg" value="09:00" min="09:00" max="18:00" step="3600" required><br>
        <input type="text" name="doel" placeholder="doel"class="form-control form-control-lg" required><br>
        <input type="submit"  class="btn btn-info btn-lg btn-block"><br><br>
    </form>

    </div>
    </div>
    </div>
</div>

   <h1 >Alle lessen</h1>
   <table class="table table-striped">
    <tr>
        <th>lesnummer</th>
        <th>ophaallocatie</th>
        <th>datum</th>  
        <th>starttijd</th>
        <th>eindtijd</th>
        <th>doel</th>
        <th>onderwerp</th>
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
         

         <td><a class="btn btn-success btn-lg btn-block" href="edit_les.php?lesID=
         <?php echo trim($rows['lesID']);?> 
         &ophaallocatie=<?php echo trim($rows['ophaallocatie']);?>
         &datum=<?php echo trim($rows['datum']);?>
         &starttijd=<?php echo trim($rows['starttijd']);?>
         &eindtijd=<?php echo trim($rows['eindtijd']);?>
         &doel=<?php echo trim($rows['doel']);?>
         &onderwerpen=<?php echo trim($rows['onderwerpen']);?>
         ">Edit</a></td>
         <td><a class="btn btn-danger btn-lg btn-block" href="delete_les.php?lesID=<?php echo $rows['lesID'];?>">Delete</a></td>
    </tr>
    
     <?php }} ?>
   </table>
             <br>

   <br><br>


</body>
</html>