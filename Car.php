<?php

class Car
{
    private $company;
    private $model;
    private $year;
    private $color;

    public function __construct($conpany, $model, $year, $color)
    {
        $this->company = $conpany;
        $this->model = $model;
        $this->year = $year;
        $this->color =  $color;
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

    public function createCar()
    {
        $dbhost = 'localhost';
        $dbuser = 'kostas';
        $dbpass = 'kostasgr57';
        $dbname = 'cardb';
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        $sql = "INSERT INTO car (company, model, year, color)
        VALUES
        ('{$this->company}', '{$this->model}', '{$this->year}', '{$this->color}');";


        if ($connection->query($sql)) {
            return "Record inserted successfully.<br />";
        }
        if ($connection->error) {
            return "Could not insert record into table: %s<br />" . $connection->error;
        }
        $connection->close();
    }

    public function updateCarById($id)
    {
        $dbhost = 'localhost';
        $dbuser = 'kostas';
        $dbpass = 'kostasgr57';
        $dbname = 'cardb';
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


        $sql = "UPDATE car
        SET 
            company = '{$this->company}',
            model = '{$this->model}',
            year = '{$this->year}',
            color = '{$this->color}'
        WHERE
            id = $id";



        if ($connection->query($sql)) {
            return "Record updated.<br />";
        }
        if ($connection->error) {
            return "Not updated: %s<br />" . $connection->error;
        }
        $connection->close();
    }

    public function getCarById($id)
    {

        $dbhost = 'localhost';
        $dbuser = 'kostas';
        $dbpass = 'kostasgr57';
        $dbname = 'cardb';
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        $sql = "SELECT * FROM car WHERE id = $id";

        $result = $connection->query($sql);

        if ($result) {
            return $result->fetch_row();
        }
        if ($connection->error) {
            return "Does not take data: %s<br />" . $connection->error;
        }
        $connection->close();
    }

    public function getAllCars()
    {

        $dbhost = 'localhost';
        $dbuser = 'kostas';
        $dbpass = 'kostasgr57';
        $dbname = 'cardb';
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        $sql = "SELECT * FROM car";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            
           return $result->fetch_all();
        } else {
            return "0 results";
        }
        $connection->close();
    }

    public function deleteCarById($id)
    {

        $dbhost = 'localhost';
        $dbuser = 'kostas';
        $dbpass = 'kostasgr57';
        $dbname = 'cardb';
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


        $sql = "DELETE FROM car WHERE id = $id";

        if ($connection->query($sql)) {
            return "Record deleted successfully";
          } else {
            return "Error deleting record: " . $connection->error;
          }
          
          $connection->close();
    }

}   