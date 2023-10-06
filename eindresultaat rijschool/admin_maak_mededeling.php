<!DOCTYPE html>
<?php
include 'db.php';
include "script.php";
include "nav.php";
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try {
        $sql = "INSERT INTO i_mededelingen VALUES (:i_mededelingID, :titel, :inhoud)";
        $placeholders = [
            'i_mededelingID' => null,
            'titel' => $_POST['titel'],
            'inhoud' => $_POST['inhoud']

        ];
        $db->insert($sql,$placeholders);
        ?>
        <script>alert('Mededeling geplaatst.')</script>; 
        <?php
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><br><br>
    <form method="POST" class="container-fluid col-md-6"><br><br>
        <?php if(isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <?php if(isset($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>
        <div class="maak-mededeling">
            <input type="text" name="titel" placeholder="Titel..."   class="form-control form-control-lg" required><br>
            <input type="text" name="inhoud" placeholder="Mededeling..." class="form-control form-control-lg" required><br>
            <input type="submit" class="btn btn-info btn-lg btn-block" ><br>
        </div>
    </form>
    <a  class="btn btn-info btn-lg btn-block container-fluid col-md-6" href="admin.php">Terug naar rijschoolhouder omgeving</a><br>
</body>