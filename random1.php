<!DOCTYPE html>
<!--stappen.php-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>random 1 & 2</title>
    </head>
    <body>
        <h1>oplossing random1:</h1>
        <?php
        $teller = rand(1, 10);
        print("Aantal willerkeurige getallen tussen 10 en 20: " . $teller . "<br>");
        while ($teller > 0){
            print(rand(10, 20) . " ");
            $teller -= 1;
        }
        
        ?>
        <br />

        <h1>oplossing random2:</h1>
        <?php
        $var = rand(1, 1000);
        print($var . " ");
        while ($var<=600) { 
            print($var . " ");
            $var = rand(1, 1000);
        }
        ?>
        
        <h1>oplossing random1 uit het grote antwoordenboek</h1>
         <?php
        $willekeurig = rand(10, 20);
        for ($var = 1; $var <= $willekeurig; $var++) {
            print($var . " ");
        }
        ?>
        
        <h1>oplossing random2 uit het grote antwoordenboek</h1>
        <?php
        $getal = rand(1, 1000);
        while ($getal < 600) {
            print($getal . ", ");
            $getal = rand(1, 1000);
        }
        print($getal);
        ?>
        
    </body>
</html>