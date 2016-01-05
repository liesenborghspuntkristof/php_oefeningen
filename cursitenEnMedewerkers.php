<?php 
//cursitenEnMedewerkers.php
class Persoon {
    private $voornaam;
    private $familienaam; 
    
    public function __construct($familienaam, $voornaam) {
        $this->voornaam = $voornaam;
        $this->familienaam = $familienaam; 
    }
    
    public function setVoornaam($voornaam){
        $this->voornaam = $voornaam;
    }
    
    public function setFamilienaam($familienaam){
        $this->familienaam = $familienaam;
    }
    
    public function getVollNaam() {
        return $this->familienaam . "," . $this->voornaam; 
    }
}

class Cursist extends Persoon {
    private $aantalVolgen; 
    
    public function __construct($familienaam, $voornaam, $aantal) {
        parent::__construct($familienaam, $voornaam);
        $this->aantalVolgen = $aantal; 
    }
    
    public function getAantalCursussen() {
        return $this->aantalVolgen; 
    }
}

class Medewerker extends Persoon {
    private $aantalGeven;
    
    public function __construct($familienaam, $voornaam, $aantal) {
        parent::__construct($familienaam, $voornaam);
        $this->aantalGeven = $aantal;
    }
    
    public function getAantalCursisten() {
        return $this->aantalGeven; 
    }
}
?>

<?php
	$cursist = new Cursist("Peeters", "Jan", 3);
	$medewerker = new Medewerker("Janssens", "Tom", 8);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8>
		<title>Cursisten en medewerkers</title>
	</head>
	<body>
		<h1>Namen</h1>
		<ul>
			<li><?php print($cursist->getVollNaam() . " volgt " .  
				$cursist->getAantalCursussen() . " cursus(sen)");?></li>
			<li><?php print($medewerker->getVollNaam() . " begeleidt " .  
				$medewerker->getAantalCursisten() .  " cursist(en) ");?> </li>
		</ul>
	</body>
</html>

