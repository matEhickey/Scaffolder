<?php
include_once("../paramBDD.php");

function createLink($titre,$message,$elem){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "INSERT INTO `link` (
		`titre`,
		`message`,
		`elem`
	)
	VALUES (
		'".$titre."',
		'".$message."',
		'".$elem."'
	);";
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		//echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		header('Location: ../commons/error.php');
		//var_dump($requete);
	}
	$lastInsert = $conn->lastInsertId();
	$conn=null;
	return($lastInsert);
}
function getAllLink(){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `link` ";
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"titre" => $row['titre'],"message" => $row['message'],"elem" => $row['elem']);
			array_push($retour,$temp);
		}
	}
	else { 
		header('Location: ../commons/error.php');
		//var_dump($requete);
	}
	$conn=null;
	return($retour);
}
function getLinkById($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `link` WHERE id=".$id;
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"titre" => $row['titre'],"message" => $row['message'],"elem" => $row['elem']);
			array_push($retour,$temp);
		}
	}
	else { 
		header('Location: ../commons/error.php');
		//var_dump($requete);
	}
	$conn=null;
	return(count($retour)>0?$retour[0]:false);
}
function updateLink($id,$titre,$message){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="UPDATE `link` SET `titre` = '".$titre."' ,`message` = '".$message."' WHERE id=".$id;
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		//echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		header('Location: ../commons/error.php');
		//var_dump($requete);
	}
	$conn=null;
}
function deleteLink($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="DELETE FROM `link` WHERE `id` =".$id;
	$statement = $conn->query($requete);
	if($statement== TRUE) {
		//echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		header('Location: ../commons/error.php');
		//var_dump($requete);
	}
	$conn=null;
}


?>