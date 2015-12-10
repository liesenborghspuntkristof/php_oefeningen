<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>gokautomaat</title>
    </head>
    <body>
        <h2>
        <?php
        $random =rand(1,10);
        $keuze = $_GET["mijngok"]; 
        print("uw gok = " . $keuze . "<br>"); 
        print("het willekeurig getal = " . $random . "<br>"); 
        print("<h1>");
        if ($random == $keuze) {print("correct, u heeft goed gegokt!");}
        else {print("niet correct, u heeft fout gegokt!");}   
        print("</h1>"); 
        ?>         
        </h2>
        
    </body>
</html>
