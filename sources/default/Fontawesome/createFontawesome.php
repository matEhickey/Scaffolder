<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("FontawesomeController.php");
	var_dump($_POST);

	$nom = htmlentities($_POST['nom'], ENT_QUOTES);
	$code = htmlentities($_POST['code'], ENT_QUOTES);
	$retour = createFontawesome($nom, $code);
	if($retour){ header('Location: showAllFontawesome.php'); }
?>
