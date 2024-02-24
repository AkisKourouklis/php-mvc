<?php

class Car {
    private $company;
    private $model;
    private $year ;
    private $color ;

    public function __construct($conpany, $model, $year, $color) {
        $this->company = $conpany ;
        $this->model = $model;
        $this->year = $year;
        $this->color =  $color;
    }

    public function setcompany($a){
        $this->company=$a;
    }

    public function setmodel($b){
        $this->model=$b;
    }

    public function setyear($c){
        $this->year=$c;
    }

    public function setcolor($d){
        $this->color=$d;
    }

    public function getcompany() {
        return $this->company;
    }

    public function getmodel() {
        return $this->model;
    }

    public function getyear() {
        return $this->year;
    }

    public function getcolor() {
        return $this->color;
    }



}
?>