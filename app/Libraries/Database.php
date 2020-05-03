<?php

/**
 * PDO Database Class
 * Connect to database
 * Create Pepared Statement
 * Bind Values
 * Return rows and results
 */

namespace App\Libraries;

use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $db;
    private $stmt;
    private $error;

    public function __construct()
    {
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => 'true',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        //Create pdo instance
        try {
            $this->db = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
