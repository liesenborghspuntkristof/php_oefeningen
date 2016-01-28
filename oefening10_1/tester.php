<?php
require_once 'entities/User.php';

for ($t=0; $t<4; $t++) {
    $u . $t = new User($t, $t . $t ); 
    $list = array(); 
    array_push($list, $u); 
}
var_dump($list); 
    setcookie("allowedIn", $list); 
        
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
        $_COOKIE ["allowedIn"] = array(); 
        var_dump($_COOKIE["allowedIn"]); 
        ?>
    </body>
</html>
