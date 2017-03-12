<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("FontawesomeController.php");
	var_dump($_GET);
	$id= $_GET['id'];
	deleteFontawesome($id);
	header('Location: showAllFontawesome.php');
?>
