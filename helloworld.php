<?php
//helloworld.php

class GreetingGenerator {
public function getGreeting() {
    return date("d/m/Y - H:i:s");
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
        <title>Hello world</title>
    </head>
    <body>
        <h1>
            <?php
            $gg = new GreetingGenerator();
            print($gg->getGreeting());
             ?>
        </h1>
    </body>
</html>