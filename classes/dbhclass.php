<?php
 require 'vendor/autoload.php';

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "oopblog";

    public function connect() {
        try {
        $dsn = 'mysql:host=' .$this->host . ';dbname=' .$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Connexion réussie";
        return $pdo;
    }
    catch(Exception $errorConnection)
    {
        die ('Erreur de connection :'.$errorConnection->getMessage());
    }
    }
}

?>