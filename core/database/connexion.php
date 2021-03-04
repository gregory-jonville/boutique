<?php

class Database
{
    // ATTRIBUTS
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'boutique';
    public $pdo;

    // METHODES
    // Constructeur
    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if ($host != null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
    }

    // Connexion Db
    public function connectDb()
    {

        try { // Indique la requête SQL à lancer quand on se connecte
            $this->pdo = new PDO(
                'mysql:host=' . $this->host . 
                ';dbname=' . $this->database,
                $this->username,
                $this->password,
                	
                array(
                    // On définit l'attribut par défaut
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    // On interragit avec la Base de données en UTF8 pour empêcher les problèmes d'accent
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    // Mode d'erreur pour avoir des warning et le descriptif des erreurs
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
            // Retour de la connexion
            return $this->pdo;
            // Récupération des erreurs
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage() . "<br/>";
            die();
        }
    }

}
?>