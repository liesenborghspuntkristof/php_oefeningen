


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forum om gegevens op te halen</title>
        <style>
            div {border: 1px solid blue; padding: 0.5em;}
            span, input {margin-top: 0.5em; margin-bottom: 0.5em;}
            
        </style>
    </head>
    <body>
        <div>
        <h1>Modules</h1>
        <form action="modulesOpzoeken.php" method="post">
            <span>Geef een minimumprijs: <input type="text" name="minimum" placeholder="minimumprijs" autofocus=""> euro</span> 
            </br>
            <span>Geef een maximumprijs: <input type="text" name="maximum" placeholder="maximumprijs"> euro</span>
            </br>
            <input type="submit" value="ok">
        </form>
        </div>
    </body>
</html>
