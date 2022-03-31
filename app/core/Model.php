<?php

// singleton pattern
class Model {
    // parametre konekcije je potrebno ucitati iz config fajla. A u njemu trebaju biti ubaceni iz .env fajla
    private $host = 'localhost';
    private $dbName = 'f1-full-schedule';
    private $user = 'root';
    private $password = '';

    public static $connection = null;

    public function __construct() {

        // ubaciti type hinting i try...catch proveru za PDO konekciju
        if(is_null(self::$connection)) {

            // podesiti default fetch mode, exception mode i no emulation mode
            self::$connection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);

        }

    }
}