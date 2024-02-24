<?php 
    require "./Mathimatika.php";
    require "./Car.php";

    $company = "Opel";
    $model = "corsa opc";


    $car = new Car("Nissan", "Gtr", "2010", "black");

    // $car->setcompany($company);
    
    // $car->setmodel($model);
    
    // $car->setyear("2016");
    
    // $car->setcolor("grey");


    echo $car->getcompany() . " ";

    echo $car->getmodel() . " ";

    echo $car->getyear() . " ";

    echo $car->getcolor() . " ";





    // $number1 = -5;
    // $number2 = 5;

    // $poutsa = new Mathimatika();

    // $poutsa->setnumber1($number1);
    // $poutsa->setnumber2($number2);

    // echo $poutsa->getnumber1() . ' ';

    // echo $poutsa->getnumber2() . ' ';

    // echo $poutsa->multiply() . ' ';

    // echo $poutsa->add() . ' ';

?>