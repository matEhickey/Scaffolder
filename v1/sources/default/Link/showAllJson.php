<?php 
	include_once("LinkController.php");
	$Links = getAllLink(); 
	echo(json_encode($Links));
?>
