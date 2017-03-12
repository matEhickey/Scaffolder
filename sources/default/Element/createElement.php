<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("ElementController.php");
	
	var_dump($_FILES);
    var_dump($_POST);
    
	$type = htmlentities($_POST['type'], ENT_QUOTES);
	$elem = "";
    
    $ok=true;
    
    switch($type){
        case(1):
            echo("That's a picture<br>");
            $elem = htmlentities($_FILES['elem']["name"],ENT_QUOTES);
            
            $move = move_uploaded_file ($_FILES['elem']["tmp_name"],"../uploaded_files/".$_FILES['elem']["name"]);
            echo("moved : ".($move?"yes":"no"));
            if(!$move){$ok = false;}
            break;
        case(2):
            echo("That's an iframe link");
            $elem = htmlentities($_POST['elem'], ENT_QUOTES);
            break;
        case(3):
            echo("That's a fontawesome icon");
            $elem = htmlentities($_POST['elem'], ENT_QUOTES);
            break;
        case(4):
            echo("That's a html code");
            $elem = htmlentities($_POST['elem'], ENT_QUOTES);
            break;
        default:
            echo("That's an error");
            break;
    }
    
    var_dump($elem);
    
    if($ok){
        $retour = createElement($type, $elem);
    }
	if(isset($retour) and $retour){ header('Location: showAllElement.php'); }
    else{ header('Location: ../commons/errorFile.php'); }
?>
