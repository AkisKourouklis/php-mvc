<?php

class CarModel
{
    private $company;
    private $model;
    private $year;
    private $color;

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
        $sql = "SELECT * FROM cars";

        return [];
    }
}
