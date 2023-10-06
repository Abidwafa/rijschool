<?php

include 'db.php';
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}

$autoID = $_GET['autoID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auto_merk = $_POST['auto_merk'];
    $auto_type = $_POST['auto_type'];
    $kenteken = $_POST['kenteken'];
    $beschikbaar = $_POST['beschikbaar'];
    $onderhoud = $_POST['onderhoud'];
    try {
            $sql = "UPDATE autos SET auto_merk=:auto_merk, auto_type=:auto_type, kenteken=:kenteken, beschikbaar=:beschikbaar, onderhoud=:onderhoud WHERE autoID=:autoID";
            $placeholders = [
                'autoID' => $autoID,
                'auto_merk' => $auto_merk,
                'auto_type' => $auto_type,
                'kenteken' => $kenteken,
                'beschikbaar' => $beschikbaar,  
                'onderhoud' => $onderhoud,      
            ];
        
            $db->update($sql, $placeholders);
            header('Location: auto.php');
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
 <body><br><br>
 <div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <div class="form-group">
    <h1 class="display-4">UPDATE</h1><br>
 <form method="POST" enctype="multipart/form-data">
    <input  class="form-control form-control-lg" type="text" name="auto_merk" value="<?php echo $_GET['auto_merk'];?>"><br>
    <input  class="form-control form-control-lg" type="text" name="auto_type" value="<?php echo $_GET['auto_type'];?>"><br>
    <input  class="form-control form-control-lg" type="text" name="kenteken" value="<?php echo $_GET['kenteken'];?>"><br>
    <input  class="form-control form-control-lg"type="text" name="beschikbaar" value="<?php echo $_GET['beschikbaar'];?>"><br>
    <input  class="form-control form-control-lg"type="text" name="onderhoud" value="<?php echo $_GET['onderhoud'];?>"><br>
    <input type="submit" class="btn btn-info btn-lg btn-block" ><br>
 </form>

 </div>
    </div>
    </div>
</div>

 
 </body>
 </html>