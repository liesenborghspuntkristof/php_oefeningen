<?php  
//Presentation/loginForm.php

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
        <title>Weighvolution</title>
        <link href="Presentation/css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>       
        <form id="login" method="post" action="aanmelden.php?action=login">           
            <input type="text" placeholder="Username" required="" autofocus="" name="username">
            <input type="password" placeholder="Password" required="" name="password">
            <input type="submit" value="login">
        </form>
        <h1 id="welkom">Welkom</h1>
        <form id="nieuw" method="post" action="aanmelden.php?action=new">
            <input type="text" placeholder="Username  (min. 6 characters)" required="" name="username">
            <input type="text" placeholder="First name" required="" name="name">
            <input type="text" placeholder="Last name" required="" name="surname">
            <input type="email" placeholder="Email" required="" name="email">
            <input type="password" placeholder="Password (min. 6 characters, min. 1 number, min. 1 Capital)" required="" name="password">
            <input type="submit" value="Join now">
        </form>
    </body>
</html>
