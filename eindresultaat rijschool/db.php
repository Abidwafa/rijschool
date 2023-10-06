<?php
class Database{
    private $database;
    private $username;
    private $password;
    private $host;
    private $dbh;

    public function __construct() {
        $this->database = 'rijschool';
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';


        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        }catch(\Exception $e) {
            die('failed to connect to database' .$e->getMessage());
        }   
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

     
    public function delete($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }
    public function update($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }
    public function select($sql,$placeholder = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
                return $result;
            } else {
                echo "Geen data beschikbaar";
            }
    }
    
   
   

    public function insert($sql,$placeholder) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
    }

    public function login($gebruikersnaam, $wachtwoord) {

        $sql = "SELECT gebruikersnaam, wachtwoord FROM rijschoolhouder WHERE gebruikersnaam=:gebruikersnaam";
        $stmt = $this->dbh->prepare($sql);
        
        $stmt->execute([
            'gebruikersnaam'=> $gebruikersnaam
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!is_null($result) && is_array($result)) {
    if (password_verify($wachtwoord, $result['wachtwoord'])) {
        session_start();
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        header("location: admin.php");
        exit();
    } else {
        echo 'Gebruikersnaam of wachtwoord is onjuist.';
        exit();
    }
} else {
    echo 'Geen gebruiker gevonden met de opgegeven gebruikersnaam.';
    exit();
}

    }

    public function login2($gebruikersnaam, $wachtwoord) {

        $sql = "SELECT gebruikersnaam, wachtwoord FROM klanten WHERE gebruikersnaam=:gebruikersnaam";
        $stmt = $this->dbh->prepare($sql);
        
        $stmt->execute([
            'gebruikersnaam'=> $gebruikersnaam
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!is_null($result) && is_array($result)) {
    if (password_verify($wachtwoord, $result['wachtwoord'])) {
        session_start();
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        header("location:klant.php");
        exit();
    } else {
        echo 'Gebruikersnaam of wachtwoord is onjuist.';
        exit();
    }
} else {
    echo 'Geen gebruiker gevonden met de opgegeven gebruikersnaam.';
    exit();
}

    }
    public function login1($gebruikersnaam, $wachtwoord) {

        $sql = "SELECT gebruikersnaam, wachtwoord FROM instructeurs WHERE gebruikersnaam=:gebruikersnaam";
        $stmt = $this->dbh->prepare($sql);
        
        $stmt->execute([
            'gebruikersnaam'=> $gebruikersnaam
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!is_null($result) && is_array($result)) {
    if (password_verify($wachtwoord, $result['wachtwoord'])) {
        session_start();
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        header("location:instructeur_admin.php");
        exit();
    } else {
        echo 'Gebruikersnaam of wachtwoord is onjuist.';
        exit();
    }
} else {
    echo 'Geen gebruiker gevonden met de opgegeven gebruikersnaam.';
    exit();
}

    }
    
}

?>