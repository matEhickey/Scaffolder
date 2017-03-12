<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("ElementController.php");
	var_dump($_GET);
	$id= $_GET['id'];
	deleteElement($id);
	header('Location: showAllElement.php');
?>
