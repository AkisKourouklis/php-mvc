<?php

namespace App\Model;

use App\Database\Db;

class CarModel
{
    private $company;
    private $model;
    private $year;
    private $color;
    private $price;
    private $power;
    private $engine;
    private $image;
    private $mileage;
    private $fuel_type;
    private $location;
    private $drive_type;
    private $doors;
    private $connection;

    public function __construct()
    {
        $db = new Db;
        $this->connection = $db->conn;
    }

    public function create()
    {
        $sql = "INSERT INTO car (company, model, year, color, price, power, engine, image, mileage, fuel_type, location, drive_type, doors)
        VALUES
        ('{$this->company}', '{$this->model}', '{$this->year}', '{$this->color}', '{$this->price}', '{$this->power}', '{$this->engine}', '{$this->image}', '{$this->mileage}', '{$this->fuel_type}', '{$this->location}', '{$this->drive_type}', '{$this->doors}' );";


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
        $sql = "UPDATE car SET company = '{$this->company}', model = '{$this->model}', year = '{$this->year}', color = '{$this->color}', price = '{$this->price}', power = '{$this->power}', engine = '{$this->engine}', image = '{$this->image}', mileage = '{$this->mileage}', fuel_type = '{$this->fuel_type}', location = '{$this->location}', drive_type = '{$this->drive_type}', doors = '{$this->doors}' WHERE id = $id";

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
            return $result->fetch_assoc();
        }

        if ($this->connection->error) {
            return $this->connection->error;
        }

        $this->connection->close();
    }

    public function search($query)
    {
        $sql = "SELECT * FROM car WHERE company LIKE '%$query%' OR model LIKE '%$query%' OR year LIKE '%$query%' OR color LIKE '%$query%' OR price LIKE '%$query%' OR power LIKE '%$query%' OR engine LIKE '%$query%' OR image LIKE '%$query%' OR mileage LIKE '%$query%' OR fuel_type LIKE '%$query%' OR location LIKE '%$query%' OR drive_type LIKE '%$query%' OR doors LIKE '%$query%'";

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
                    'color' => $row['color'],
                    'price' => $row['price'],
                    'power' => $row['power'],
                    'engine' => $row['engine'],
                    'image' => $row['image'],
                    'mileage' => $row['mileage'],
                    'fuel_type' => $row['fuel_type'],
                    'location' => $row['location'],
                    'drive_type' => $row['drive_type'],
                    'doors' => $row['doors']
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

    public function getall($filters)
    {
        $sql = "SELECT * FROM car";
        $where = [];
        foreach ($filters as $key => $value) {
            if ($value && ($key !== 'power')) {
                $where[] = "$key = '$value'";
            }
        }
        if (count($where) > 0) {
            $sql .= " WHERE " . implode(' AND ', $where);
            if (isset($filters['power']['lowest'])) {
                $lowest = $filters['power']['lowest'];
                $highest = $filters['power']['highest'];
                $sql .= " AND power BETWEEN $lowest AND $highest";
            }
        } else if (isset($filters['power']['lowest'])) {
            $lowest = $filters['power']['lowest'];
            $highest = $filters['power']['highest'];
            $sql .= " WHERE power BETWEEN $lowest AND $highest";
        }


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
                    'color' => $row['color'],
                    'price' => $row['price'],
                    'power' => $row['power'],
                    'engine' => $row['engine'],
                    'image' => $row['image'],
                    'mileage' => $row['mileage'],
                    'fuel_type' => $row['fuel_type'],
                    'location' => $row['location'],
                    'drive_type' => $row['drive_type'],
                    'doors' => $row['doors']
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

    public function setprice($e)
    {
        $this->price = $e;
    }

    public function setpower($f)
    {
        $this->power = $f;
    }

    public function setengine($g)
    {
        $this->engine = is_numeric($g) ? (int)$g : 0;
    }

    public function setimage($h)
    {
        $this->image = $h;
    }

    public function setmileage($i)
    {
        $this->mileage = is_numeric($i) ? (int)$i : 0;
    }

    public function setfuel_type($j)
    {
        $this->fuel_type = $j;
    }

    public function setlocation($k)
    {
        $this->location = $k;
    }

    public function setdrive_type($l)
    {
        $this->drive_type = $l;
    }


    public function setdoors($m)
    {
        $this->doors = is_numeric($m) ? (int)$m : 0;
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

    public function getprice()
    {
        return $this->price;
    }

    public function getpower()
    {
        return $this->power;
    }

    public function getengine()
    {
        return $this->engine;
    }

    public function getimage()
    {
        return $this->image;
    }

    public function getmileage()
    {
        return $this->mileage;
    }

    public function getfuel_type()
    {
        return $this->fuel_type;
    }

    public function getlocation()
    {
        return $this->location;
    }

    public function getdrive_type()
    {
        return $this->drive_type;
    }

    public function getdoors()
    {
        return $this->doors;
    }
}
