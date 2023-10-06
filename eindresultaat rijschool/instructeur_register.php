<?php
include 'db.php';
include "script.php";
include "nav.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = trim($_POST['wachtwoord']);
    $confirm_wachtwoord = trim($_POST['confirm_wachtwoord']);

    // Check if gebruikersnaam already exists
    $db = new Database();
    $result = $db->select("SELECT * FROM instructeurs WHERE gebruikersnaam = :gebruikersnaam", [':gebruikersnaam' => $gebruikersnaam]);
    if (!empty($result)) {
        $error_message = "gebruikersnaam already exists.";
    } else {
        // Check if wachtwoords match
        if ($wachtwoord !== $confirm_wachtwoord) {
            $error_message = "wachtwoords do not match.";
        } else {
            // Hash the wachtwoord
            $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
            // Insert new user into the database
            $db->insert("INSERT INTO instructeurs (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)", [':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $hashed_wachtwoord]);
            $success_message = "Registration successful!";
            header("Location: login_instructeur.php");
            exit;
        }
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
    <title>Register</title>
</head>
<body>
    <br><br><br>
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="form-group">
                <form method="POST"><br><br>
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
                    <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam"   class="form-control form-control-lg" required><br>
                    <input type="password" name="wachtwoord" placeholder="wachtwoord" class="form-control form-control-lg" required><br>
                    <input type="password" name="confirm_wachtwoord" placeholder="confirm wachtwoord" class="form-control form-control-lg" required><br>
                    <input type="submit"  class="btn btn-info btn-lg btn-block" ><br>
                </form>
            </div>
        </div>
    </div>
</div>

<a  class="btn btn-info btn-lg btn-block" href="admin.php">Terug naar Admin</a>
</body>
</html>