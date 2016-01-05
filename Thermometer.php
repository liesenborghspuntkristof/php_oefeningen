<?php 
//Thermometer.php

class Thermometer {
    private $graden; 
    
    public function verhoog($aantalGraden) {
        $this->graden += $aantalGraden;
    }
    
    public function verlaag($aantalGraden) {
        $this->graden -= $aantalGraden; 
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
        <?php $therm = new Thermometer();
        $therm->verhoog(15.5); 
        print($therm->getGraden()."°" . "</br>");
        $therm->verlaag(8.5); 
        print($therm->getGraden()."°" . "</br>"); 
        ?>
        </h1>
        
    </body>
</html>
