<?php
include 'db.php';
include "script.php";
include "nav.php";

$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:login_instructeur.php");
}

$today = date('Y-m-d');
$maxdate = date('Y-m-d', strtotime('+7 days'));

$lesID = $_GET['lesID'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ophaallocatie = $_POST['ophaallocatie'];
    $datum = $_POST['datum'];
    $starttijd = $_POST['starttijd'];
    $eindtijd = $_POST['eindtijd'];
    $doel = $_POST['doel'];
    try {
            $sql = "UPDATE lessen SET ophaallocatie=:ophaallocatie, datum=:datum, starttijd=:starttijd, eindtijd=:eindtijd, doel=:doel WHERE lesID=:lesID";
            $placeholders = [
                'lesID' => $lesID,
                ':ophaallocatie' => $_POST['ophaallocatie'],
                ':datum' => $_POST['datum'],
                ':starttijd' => $_POST['starttijd'],
                ':eindtijd' => $_POST['eindtijd'],
                ':doel' => $_POST['doel']
            ];
        
            $db->update($sql, $placeholders);
            header('Location: lesrooster.php');
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        
        }
    } 
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>UPDATE</title>
 </head>
 <body><br><br><br>
 <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">Aanpassen</h1><br>
 <form method="POST" enctype="multipart/form-data">
        <input  class="form-control form-control-lg" type="text" name="ophaallocatie" value="<?php echo $_GET['ophaallocatie'];?>"><br>
        <input  class="form-control form-control-lg" type="date" name="datum" min="<?php echo $today; ?>" max="<?php echo $maxdate; ?>" value="<?php echo $_GET['datum'];?>"><br>
        <input  class="form-control form-control-lg" type="time" name="starttijd" min="08:00" max="17:00" step="3600" value="08:00"><br>
        <input  class="form-control form-control-lg"type="time" name="eindtijd" min="9:00" max="18:00" step="3600" value="09:00"><br>
        <input  class="form-control form-control-lg"type="text" name="doel" value="<?php echo $_GET['doel'];?>"><br>
        <input type="submit"  class="btn btn-info btn-lg btn-block"><br><br>
 </form>

 </div>
    </div>
    </div>
</div>

 
 </body>
 </html>