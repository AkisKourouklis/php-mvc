<?php

namespace App\Database;

use mysqli;

class Db
{

    private  $dbhost = 'localhost';
    private  $dbuser = 'root';
    private  $dbpass = '';
    private  $dbname = 'cardb';

    public $conn;

    public function __construct()
    {

        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    }




    public function migrate()
    {

        $sql = "CREATE TABLE IF NOT EXISTS car(
        id INT AUTO_INCREMENT PRIMARY KEY,
        company VARCHAR(30) NOT NULL,
        model VARCHAR(30) NOT NULL,
        year VARCHAR(50),
       color VARCHAR(40))";

        $this->conn->query($sql);

        if ($this->conn->query($sql)) {
            return true;
        }

        if ($this->conn->error) {
            return $this->conn->error;
        }

        $this->conn->close();
    }
}
