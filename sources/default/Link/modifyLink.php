<?php 
	include_once("LinkController.php");
	//var_dump($_POST);
	$id = htmlentities($_POST['id'], ENT_QUOTES);
	$titre = htmlentities($_POST['titre'], ENT_QUOTES);
	$message = htmlentities($_POST['message'], ENT_QUOTES);
	updateLink($id, $titre, $message);
	header('Location: showAllLink.php');
?>
