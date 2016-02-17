<?php
include_once 'Data/userDAO.php';
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
        <?php
        $userDAO = new UserDAO();
        $userlijst = $userDAO->getAll();
        var_dump($userlijst); 
        ?>
    </body>
</html>
