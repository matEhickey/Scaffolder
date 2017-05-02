<?php 
	include_once("LinkController.php");
	 $id = htmlentities($_GET['id'], ENT_QUOTES); 
	$Link = getLinkById($id); 
	echo(json_encode($Link));
?>
