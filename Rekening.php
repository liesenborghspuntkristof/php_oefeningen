<?php
//Rekening.php

abstract class Rekening {
    private $rekeningnummer;
    private $rekeningsaldo;  
    
    public function __construct($rekeningnummer) {
        $this->rekeningnummer = $rekeningnummer;
        $this->rekeningsaldo = 0; 
    }
    
    
    public function stort($bedrag) {
        $this->rekeningsaldo += $bedrag; 
    }
    
    abstract public function voerIntrestDoor();  
    
    
    public function getSaldo() {
        return $this->rekeningsaldo; 
    }
}

class Zichtrekening extends Rekening {
    
    public function __construct($rekeningnummer) {
        parent::__construct($rekeningnummer);
    }

    private static $interest = 0.03; 
    
    public function voerIntrestDoor() {
        parent::stort (parent::getSaldo() * self::$interest);
    }

}

class Spaarrekening extends Rekening {
    
    public function __construct($rekeningnummer) {
        parent::__construct($rekeningnummer);
    }

    private static $interest = 0.025; 
    
    public function voerIntrestDoor() {
        parent::stort(parent::getSaldo() * self::$interest);
    }
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8>
		<title>Rekeningnummers</title>
	</head>
	<body>
		<h1>
			<?php
			$zichtrek = new Zichtrekening("091-0122401-16");
			print("Het saldo is: " .$zichtrek->getSaldo() . "<br />");
			$zichtrek->stort(200);
			print("Het saldo is: " .$zichtrek->getSaldo() . "<br />");
			$zichtrek->voerIntrestDoor();
	print("Het saldo is: " .$zichtrek->getSaldo() . "<br />");
			?>
		</h1>
		<h1>
			<?php
			$spaarrek = new Spaarrekening("091-0122401-19");
			print("Het saldo is: " .$spaarrek->getSaldo() . "<br />");
			$spaarrek->stort(200);
			print("Het saldo is: " .$spaarrek->getSaldo() . "<br />");
			$spaarrek->voerIntrestDoor();
	print("Het saldo is: " .$spaarrek->getSaldo() . "<br />");
			?>
		</h1>            
	</body>
</html>

