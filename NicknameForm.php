<?php 

session_start(); 

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
        <title>nickname kiezer</title>
    </head>
    <body>
        <h1>Kies een nickname</h1>
        <form action="chatmessenger.php?action=newnick" method="post">
            nickname: <input type="text" name="nick" autofocus="" required="" placeholder="kickass nickname hier">
            <input type="submit" value="let's chat">
    </body>
</html>
