<?php 
	include_once("LinkController.php");
	//var_dump($_GET);
	$id= $_GET['id'];
	deleteLink($id);
	header('Location: showAllLink.php');
?>
