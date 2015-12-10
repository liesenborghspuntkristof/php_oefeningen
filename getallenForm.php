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
        <style>
            form {border: 1px solid blue; padding: 0.5em; width: 50%;}         
            form input {margin: 0.5em 5em 0.5em 0em; width: 50%;}
        </style>
    </head>
    <body>
        <h1>Mogelijke waarden van de parameter 'bewerking' zijn: </h1>
                <ul>
            <li>1 -> Optellen</li>
            <li>2 -> Aftrekken</li>
            <li>3 -> Vermenigvuldigen</li>
            <li>4 -> Delen</li>
        </ul>
        
        <form action="getallenkiezen.php" method="get">
            Eerste getal: <input type="text" name="getal1" autofocus="" placeholder="getal 1" /><br>
            Tweede getal: <input type="text" name="getal2"  placeholder="getal 2" /><br>
            bewerking: <input type="text" name="bewerking"  placeholder="operatornummer" /><br>
            <input type="submit" value="Som berekenen" /> 
        </form>

    </body>
</html>
