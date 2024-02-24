<?php 
    require "./Mathimatika.php";

    $number1 = -5;
    $number2 = 5;

    $poutsa = new Mathimatika();

    $poutsa->setnumber1($number1);
    $poutsa->setnumber2($number2);

    echo $poutsa->getnumber1() . ' ';

    echo $poutsa->getnumber2() . ' ';

    echo $poutsa->multiply() . ' ';

    echo $poutsa->add() . ' ';
?>