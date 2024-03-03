<?php

require_once "database/Db.php";

class CarModel
{
    private $company;
    private $model;
    private $year;
    private $color;
    private $connection;

    public function __construct()
    {
        $db = new Db;
        $this->connection = $db->conn;
    }

    public function create()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function get()
    {
        $sql = "SELECT * FROM car";

        return [];
    }

    public function getall()
    {
        $sql = "SELECT * FROM car";
        $result = $this->connection->query($sql);

        if ($result) {
            return $result->fetch_all();
        }

        if ($this->connection->error) {
            return $this->connection->error;
        }

        $this->connection->close();
    }
}
