<?php

function string_to_ascii2($string) {
    $ascii = NULL;

    for ($i = 0; $i < strlen($string); $i++) {
        $ascii = $ascii . "/" . ord($string[$i]);
    }

    return($ascii);
}

function string_to_morse($string) {
    $convert = NULL;
    $morse = array(
        97 => "._", //a
        98 => "_...", //b
        99 => "-.-.", //c
        100 => "-..", //d
        101 => ".", //e
        102 => ".._.", //f
        103 => "_ _.", //g
        104 => "....", //h
        105 => "..", //i
        106 => "._ _ _", //j
        107 => "_._", //k
        108 => "._..", //l
        109 => "_ _", //m
        110 => "_.", //n
        111 => "_ _ _", //o
        112 => "._ _.", //p
        113 => "_ _._", //q
        114 => "._.", //r
        115 => "...", //s
        116 => "_", //t
        117 => ".._", //u
        118 => "..._", //v
        119 => "._ _", //w
        120 => "_.._", //x
        121 => "_._ _", //y
        122 => "_ _.." //z  
    );
    for ($i = 0; $i < strlen($string); $i++) {
        $morseCode = ord($string[$i]);
        if ($morseCode >= 65 && $morseCode <= 90) {
            $morseCode = $morseCode + 32;
        }
        if ($morseCode >= 97 && $morseCode <= 122) {
            $convert = $convert . "/" . $morse[$morseCode];
        } elseif ($morseCode == 32) {
            $convert = $convert . "    ";
        } else {
            $convert = $convert . "/false input";
        }
    }
    var_dump($morse);
    return($convert);
}
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
        <title>W3school tests</title>
        <style>
            form {margin-top: 2em;}
            #frame{position: relative; margin-bottom: 2em; }
        </style>
    </head>
    <body>
        <?php
        $d1 = strtotime("December 25");
        $x = time();
        print ($d1 . " => Unix time stamp for next 25 Dec. </br>" . $x . " => Unix time stamp from now </br>");
        $d2 = ceil(($d1 - time()) / 60 / 60 / 24);
        echo "There are " . $d2 . " days until Xmas.";
        ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <?php
        $height = 500;
        $width = 1000;
        $startW = 80;
        $endW = 60;
        $mod = $width % $startW;
        $fac = $width / ($startW + $mod);
        $sW = $width - ($startW * $fac);
        $eW = $width - ($endW * $fac);
        $sD = 10;
        $eD = $width - 10;
        ?>
        <div id="frame">
            <svg height = "<?php echo $height; ?>" width = "<?php echo $width; ?>">
            <line x1="0" y1="0" x2="0" y2="<?php echo $height; ?>" style="fill:none; stroke:black; stroke-width:3" />
            <line x1="0" y1="<?php echo $height; ?>" x2="<?php echo $width; ?>" y2="<?php echo $height; ?>" style="fill:none; stroke:black; stroke-width:3" />
            <polyline points="<?php echo $sD . ',' . $sW . ' ' . $eD . ',' . $eW ?>" style="fill:none; stroke:black; stroke-width:3"/>  
            <polyline points="10,100 50,145 100,188 120,190 200,320 250,200" style="fill:none; stroke:red; stroke-width:3"/>
            <circle cx="50" cy="145" r="5" stroke="black" stroke-width="1" fill="red" />
            <a xlink:href="http://www.w3schools.com/svg/" target="_blank">
                <circle cx="100" cy="188" r="5" stroke="black" stroke-width="1" fill="red" />
            </a>
            <text x="0" y="<?php echo $width; ?>" fill="red">0</text>
            <text x="10" y="<?php echo $width; ?>" fill="red">1</text>
            </svg>

        </div>
        <?php
        $string = "Kristof Liesenborghs";
        $test = string_to_ascii2($string);
        echo "ASCII '" . $string . "' = " . $test;
        $mCode = string_to_morse($string);
        echo "<pre>morse '" . $string . "' = " . $mCode . "</pre>";
        ?>
    </body>
</html>
