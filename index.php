<?php 
    require "./Mathimatika.php";
    require "./Car.php";
    // require "./database.php";

    $company = "Opel";
    $model = "corsa opc";
    $id = 2;

    $car = new Car("Nissan", "Gtr", "2010", "black");

    $car->setcompany("seat");
    
    $car->setmodel("ibiza");
    
    $car->setyear("2016");
    
    $car->setcolor("grey");


    // echo $car->getcompany() . " ";

    // echo $car->getmodel() . " ";

    // echo $car->getyear() . " ";

    // echo $car->getcolor() . " ";

    // echo $car->createCar();

    // echo $car->updateCarById($id);

    // print_r($car->getCarById($id));

    print_r($car->getAllCars());

    // $car->deleteCarById($id);



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