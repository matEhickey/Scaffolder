<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("FontawesomeController.php");
	var_dump($_POST);
	$id = htmlentities($_POST['id'], ENT_QUOTES);
	$nom = htmlentities($_POST['nom'], ENT_QUOTES);
	$code = htmlentities($_POST['code'], ENT_QUOTES);
	updateFontawesome($id, $nom, $code);
	header('Location: showAllFontawesome.php');
?>
