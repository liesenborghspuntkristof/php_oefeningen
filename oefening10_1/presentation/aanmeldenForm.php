<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>geheime informatie</title>
        <style>
            form {display: inline-block; maring: 1em;}
            input {display: block; margin: 1em;}
            a {display: inline; margin: 2em;}
        </style>
    </head>
    <body>
        <form method="post" action="aanmelden.php?action=login">
            <input type="text" name="username" placeholder="uw gebruikersnaam" autofocus="" required="">
            <input type="password" name="password" placeholder="uw wachtwoord" required="">
            <input type="submit" value="aanmelden">           
        </form>
        <a href="nieuwegebruiker.php">nieuwe gebruiker</a>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
