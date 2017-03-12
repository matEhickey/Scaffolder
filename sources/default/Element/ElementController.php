<?php
include_once("../paramBDD.php");
function createElement($type,$elem){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "INSERT INTO `element` (
		`type`,
		`elem`
	)
	VALUES (
		'".$type."',
		'".$elem."'
	);";
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		//echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$lastInsert = $conn->lastInsertId();
	$conn=null;
	return($lastInsert);
}


function reCreateElement($table, $tableId, $elemId){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
    
	$requete ="UPDATE `".$table."` SET `elem` = '".$elemId."' WHERE id=".$tableId;
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		//echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$conn=null;
}



function getElement(){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `element` ORDER BY id ASC";
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"type" => $row['type'],"elem" => $row['elem']);
			array_push($retour,$temp);
		}
	}
	else { 
		die("Problème de connection à la base.");
	}
	$conn=null;
	return($retour);
}
function getElementById($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
    if($id == ""){$id=0;}
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete = "    SELECT * FROM  `element` WHERE id=".$id;
	$retour = [];
	if ($statement = $conn->query($requete)) {
		while($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$temp = array("id" => $row['id'],"type" => $row['type'],"elem" => $row['elem']);
			array_push($retour,$temp);
		}
	}
	else { 
        echo($requete);
		die("<br>fail requete");
	}
	$conn=null;
	return(count($retour)>0?$retour[0]:false);
}
function updateElement($id,$type,$elem){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="UPDATE `element` SET `type` = '".$type."' ,`elem` = '".$elem."' WHERE id=".$id;
	$statement = $conn->query($requete);
	if($statement == TRUE) {
		echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$conn=null;
}
function deleteElement($id){
	$serverName = getServerName();
	$username = getUser();
	$password = getPsw();
	$database = getBase();
	$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);
	$requete ="DELETE FROM `element` WHERE `id` =".$id;
	$statement = $conn->query($requete);
	if($statement== TRUE) {
		echo "<h3>L'opération a bien été effectuée</h3>";
	}
	else{
		echo "<h3>Une erreur s'est produite.</h3>";
	}
	$conn=null;
}


function afficheElement($id){
    $elem = getElementById($id);
    //var_dump($id);
    //var_dump($elem);
    if(isset($elem["type"])){
        switch($elem["type"]){
            case 1:
                if(substr($elem["elem"],0,4) == "http"){
                    echo("<img class='img-responsive' src='".$elem["elem"]."'>");
                }
                else{  echo("<div align=\"center\"><img class='img-responsive' src='../uploaded_files/".$elem["elem"]."'></div>"); }
                break;
            case 2:
                echo("<div class=\"iframe-responsive-wrapper\">
                                    <img class=\"iframe-ratio\" src=\"data:image/gif;base64,R0lGODlhEAAJAIAAAP///wAAACH5BAEAAAAALAAAAAAQAAkAAAIKhI+py+0Po5yUFQA7\"/>
                                    <iframe src=\"".$elem["elem"]."\" width=\"640\" height=\"360\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div>");
                break;
            case 3:
                echo("<div align=\"center\"><i style='color: rgb(70,70,70);' class=\"fa fa-5x fa-border ".$elem["elem"]."\"></i></div>");
                break;
            case 4:
                echo(html_entity_decode($elem["elem"],ENT_QUOTES));
                break;
            
        }
    }
}


?>