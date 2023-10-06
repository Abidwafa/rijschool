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

$today = date('Y-m-d');
$maxdate = date('Y-m-d', strtotime('+7 days'));


if(isset($_GET)) {
    $sql = "SELECT * FROM instructeurs";
    $instructeurs = $db->select($sql);
} else {
    header("location:instructeur_admin.php");
}

if(isset($_GET)) {
    $sql = "SELECT * FROM klanten";
    $klanten = $db->select($sql);
} else {
    header("location:instructeur_admin.php");
}
if(isset($_GET)) {
    $sql = "SELECT * FROM autos";
    $autos = $db->select($sql);
} else {
    header("location:instructeur_admin.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try {
        $sql = "INSERT INTO lessen VALUES (:lesID, :instructeurID, :klantID, :autoID, :ophaallocatie, :datum, :starttijd, :eindtijd, :doel, :onderwerpen)";
        $placeholders = [
            'lesID' => null,
            'instructeurID' => $_POST['instructeur'],
            'klantID' => $_POST['klant'],
            'autoID' => $_POST['auto'],
            'ophaallocatie' => $_POST['ophaallocatie'],
            'datum' => $_POST['datum'],
            'starttijd' => $_POST['starttijd'],
            'eindtijd' => $_POST['eindtijd'],
            'doel' => $_POST['doel'],
            'onderwerpen' => null
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
<body>
    <br><br><br>
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
                <label for="instructeur">Selecteer instructeur</label>
                <select name="instructeur" class="form-control form-control-lg">
                    <?php
                    foreach($instructeurs as $instructeur) {
                    ?>
                    <option value="<?php echo $instructeur['instructeurID']?>"><?php echo $instructeur['gebruikersnaam']; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="klant">Selecteer klant</label>
                <select name="klant" class="form-control form-control-lg">
                    <?php
                    foreach($klanten as $klant) {
                    ?>
                    <option value="<?php echo $klant['klantID']?>"><?php echo $klant['naam']; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="auto">Selecteer auto</label>
                <select name="auto" class="form-control form-control-lg">
                    <?php
                    foreach($autos as $auto) {
                    ?>
                    <option value="<?php echo $auto['autoID']?>"><?php echo $auto['auto_merk']; ?> <?php echo $auto['auto_type']; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <input type="text" name="ophaallocatie" placeholder="Ophaallocatie..." class="form-control form-control-lg" required><br>
                <label for="date">Datum</label>
                <input type="date" name="datum" class="form-control form-control-lg" min="<?php echo $today; ?>" max="<?php echo $maxdate; ?>" required><br>
                <label for="starttijd">Starttijd</label>
                <input type="time" name="starttijd" value="08:00" class="form-control form-control-lg" min="08:00" max="17:00" step="3600" required><br>
                <label for="eindtijd">Eindtijd</label>
                <input type="time" name="eindtijd" value="09:00" class="form-control form-control-lg" min="9:00" max="18:00" step="3600" required><br>
                <input type="text" name="doel" placeholder="Doel..." class="form-control form-control-lg" required><br>
                <input type="hidden" name="onderwerpen" placeholder="Onderwerpen..." class="form-control form-control-lg" required>
                <input type="submit"  class="btn btn-info btn-lg btn-block" ><br>
        </form>
</body>