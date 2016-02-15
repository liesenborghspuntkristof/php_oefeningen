<?php
//Presentation/weighvolutionChart.php
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>
        <form id="login" method="post"  action="aanmelden.php?action=logout">
            <i class="pastelGroen fa fa-user"></i>
            <?php echo "<span class='pastelGroen'>" . $_SESSION["username"] . "</span>" ?>; 
            <input type="submit" value="logout">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
