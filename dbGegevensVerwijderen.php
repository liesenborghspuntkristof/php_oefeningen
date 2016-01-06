<?php
//dbGegevensVerwijderen.php

class ModuleLijst {

	public function deleteModule($id) {
		$sql = "delete from modules where id = :id" ;
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp;charset=utf8", 
			"cursusgebruiker", "cursuspwd");
		
		$stmt = $dbh->prepare($sql);
		$stmt->execute(array(':id' => $id));
		$dbh = null;
	}

}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8>
		<title>Modules</title>
	</head>
	<body>
		<h1>Module verwijderen</h1>
		<?php
		$mlijst = new ModuleLijst();
		$mlijst->deleteModule(12);
		?>
	</body>
</html>

