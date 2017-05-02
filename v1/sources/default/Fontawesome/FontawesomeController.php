<?php
include_once("../paramBDD.php");
function createFontawesome($nom,$code){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "INSERT INTO `fontawesome` (
		`nom`,
		`code`
	)
	VALUES (
		'".$nom."',
		'".$code."'
	);";
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$lastInsert = $conn->lastInsertId();
	$conn=null;
	return($lastInsert);
}
function getFontawesome(){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `fontawesome` ";
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"nom" => $row['nom'],"code" => $row['code']);
			array_push($retour,$temp);
		}
	}
	else { 
		die("Problème de connection à la base.");
	}
	$conn=null;
	return($retour);
}
function getFontawesomeById($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `fontawesome` WHERE id=".$id;
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"nom" => $row['nom'],"code" => $row['code']);
			array_push($retour,$temp);
		}
	}
	else { 
		die("fail requete");
	}
	$conn=null;
	return($retour);
}
function updateFontawesome($id,$nom,$code){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="UPDATE `fontawesome` SET `nom` = '".$nom."' ,`code` = '".$code."' WHERE id=".$id;
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$conn=null;
}
function deleteFontawesome($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="DELETE FROM `fontawesome` WHERE `id` =".$id;
	$statement = $conn->query($requete);
	if($statement== TRUE) {
		echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$conn=null;
}


?>