<?php 
    class Mathimatika{
        private $number1;
        private $number2;
        
        public function setnumber1($a) {
           $this->number1= $a;
           
        }
        public function setnumber2($b) {
            $this->number2= $b;
            
         }
        public function getnumber1() {
            return $this->number1;
            
        }
        public function getnumber2() {
            return $this->number2;
            
        }
        
        // multiply function
        public function multiply() {
            return $this->number1 * $this->number2;


        }
        // add function
        public function add() {
            return $this->number1 + $this->number2;

        }


    } 


?>