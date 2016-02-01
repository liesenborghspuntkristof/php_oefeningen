<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>geheime inhoud</title>
        <style>
            form {display: inline-block; maring: 1em;}
            input {display: inline-block; margin: 1em;}
            a {display: inline; margin: 2em;}
        </style>
    </head>
    <body>
        <form method="post" action="nieuwegebruiker.php?action=new">
            Kies een gebruikersnaam: <input type="text" name="username" required="">
            </br>
            Kies een wachtwoord: <input type="password" name="password" required="">
            <input type="submit" value="maak nieuwe gebruiker aan">
        </form>
        <?php
        ?>
    </body>
</html>
