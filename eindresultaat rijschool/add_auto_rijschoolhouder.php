<!DOCTYPE html>
<?php
include 'db.php';
include 'nav.php';
include 'script.php';
$db = new Database();

session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location:index.php");
}

if(isset($_GET)) {
    $sql = "SELECT * FROM instructeurs";
    $instructeurs = $db->select($sql);
} else {
    header("location:admin.php");
}

if(isset($_GET)) {
    $sql = "SELECT * FROM autos";
    $autos = $db->select($sql);
} else {
    header("location:admin.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try {
        $instructeurID = $_POST['instructeur'];
        $autoID = $_POST['auto'];

        $sql = "UPDATE instructeurs SET autoID=:autoID WHERE instructeurID=:instructeurID";
        $placeholders = [
            'instructeurID' => $instructeurID,
            'autoID' => $autoID
        ];

        $db->update($sql, $placeholders);
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
                <input type="submit"  class="btn btn-info btn-lg btn-block" ><br>
        </form>
</body>