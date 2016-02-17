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
        <div id="graph">
            <svg height = "<?php echo $height; ?>" width = "<?php echo $width; ?>">
            <line x1="0" y1="0" x2="0" y2="<?php echo $height; ?>" style="fill:none; stroke:black; stroke-width:3" />
            <line x1="0" y1="<?php echo $height; ?>" x2="<?php echo $width; ?>" y2="<?php echo $height; ?>" style="fill:none; stroke:black; stroke-width:3" />
            <polyline points="<?php echo $startIdeaalLijn; ?> <?php echo $EindeIdeaalLijn; ?>" style="fill:none; stroke:red; stroke-width:3"/>
<!--            <polyline points="<?php // echo $sD . ',' . $sW . ' ' . $eD . ',' . $eW ?>" style="fill:none; stroke:black; stroke-width:3"/>  
            <polyline points="10,100 50,145 100,188 120,190 200,320 250,200" style="fill:none; stroke:red; stroke-width:3"/>
            <circle cx="50" cy="145" r="5" stroke="black" stroke-width="1" fill="red" />
            <a xlink:href="http://www.w3schools.com/svg/" target="_blank">
                <circle cx="100" cy="188" r="5" stroke="black" stroke-width="1" fill="red" />
            </a>
            <text x="0" y="<?php // echo $width; ?>" fill="red">0</text>
            <text x="10" y="<?php // echo $width; ?>" fill="red">1</text>-->
            </svg>

        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
