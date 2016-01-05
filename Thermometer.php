<?php 
//Thermometer.php

class Thermometer {
    private $graden; 
    
    public function __construct($graden) {
        $this->graden = $graden;
    }
    
    public function verhoog($aantalGraden) {
        if( ($this->graden + $aantalGraden) <= 100) {
        $this->graden += $aantalGraden;
    } 
    }
    
    public function verlaag($aantalGraden) {
        if( ($this->graden - $aantalGraden) >=-50) {
        $this->graden -= $aantalGraden; 
        }
    }
      
    public function getGraden() {
        return $this->graden;
    }
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>
        <?php $therm = new Thermometer(20);
        print($therm->getGraden()."°" . "</br>"); 
        $therm->verhoog(81); 
        print($therm->getGraden()."°" . "</br>");
        $therm->verlaag(20.5); 
        print($therm->getGraden()."°" . "</br>"); 
        ?>
        </h1>
        
    </body>
</html>
