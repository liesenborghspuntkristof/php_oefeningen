<?php
//ingredienten.php

class IngredientenArrayGenerator {
    public function getIngredienten() {
        $ingredienten = array();
        array_push($ingredienten, "bloem");
        array_push($ingredienten, "zout"); 
        array_push($ingredienten, "suiker");
        array_push($ingredienten, "gist"); 
        $ingredienten[] = "water"; 
        return $ingredienten; 
        
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
        <pre>
        <?php
        $ingredienten = new IngredientenArrayGenerator(); 
        print_r($ingredienten->getIngredienten()); 
        ?>
        </pre>
    </body>
</html>
