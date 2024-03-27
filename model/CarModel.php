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
        $sql = "INSERT INTO car (company, model, year, color)
        VALUES
        ('{$this->company}', '{$this->model}', '{$this->year}', '{$this->color}');";


        if ($this->connection->query($sql)) {
            $insertedId = $this->connection->insert_id;
            $insertedData = $this->get($insertedId);
            return $insertedData;
        }
        if ($this->connection->error) {
            return  $this->connection->error;
        }
        $this->connection->close();
    }

    public function update($id)
    {
        $sql = "UPDATE car SET company = '{$this->company}', model = '{$this->model}', year = '{$this->year}', color = '{$this->color}' WHERE id = $id";

        $result = $this->connection->query($sql);

        if ($this->connection->query($sql)) {
            $updatedData = $this->get($id);

            return $updatedData;
        }
        if ($this->connection->error) {
            return  $this->connection->error;
        }
        $this->connection->close();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM car WHERE id = $id";
        $result = $this->connection->query($sql);

        if ($result) {
            return "Record deleted successfully";
        }

        if ($this->connection->error) {
            return $this->connection->error;
        }

        $this->connection->close();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM car WHERE id = $id";
        $result = $this->connection->query($sql);

        if ($result) {
            return $result->fetch_row();
        }

        if ($this->connection->error) {
            return $this->connection->error;
        }

        $this->connection->close();
    }

    public function getall()
    {
        $sql = "SELECT * FROM car";
        $result = $this->connection->query($sql);

        if ($result && $result->num_rows > 0) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $formattedRows = array();
            foreach ($rows as $row) {
                $formattedRow = array(
                    'id' => $row['id'],
                    'company' => $row['company'],
                    'model' => $row['model'],
                    'year' => $row['year'],
                    'color' => $row['color']
                );
                $formattedRows[] = $formattedRow;
            }
            return $formattedRows;
        }

        if ($this->connection->error) {
            return $this->connection->error;
        }

        $this->connection->close();
    }

    public function setcompany($a)
    {
        $this->company = $a;
    }

    public function setmodel($b)
    {
        $this->model = $b;
    }

    public function setyear($c)
    {
        $this->year = $c;
    }

    public function setcolor($d)
    {
        $this->color = $d;
    }

    public function getcompany()
    {
        return $this->company;
    }

    public function getmodel()
    {
        return $this->model;
    }

    public function getyear()
    {
        return $this->year;
    }

    public function getcolor()
    {
        return $this->color;
    }
}
