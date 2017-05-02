    
<?php     
        
	include_once('LinkController.php');    
    include_once('../Element/ElementController.php');    
    
	var_dump($_POST);    
    var_dump($_FILES);    
        
        $titre = htmlentities($_POST['titre'], ENT_QUOTES);    
$message = htmlentities($_POST['message'], ENT_QUOTES);    
    

    $typeElem = htmlentities($_POST['typeElem'], ENT_QUOTES);    
	$elem = '';    
        
    $ok = true;    
	if($_POST['typeElem'] == 1){    
        $elem = htmlentities($_FILES['elem']['name'],ENT_QUOTES);    
        $move = move_uploaded_file ($_FILES['elem']['tmp_name'],'../uploaded_files/'.$_FILES['elem']['name']);    
        echo('moved : '.($move?'yes':'no'));    
        if(!$move){$ok = false;}    
    
    }else{    
        $elem = htmlentities($_POST['elem'], ENT_QUOTES);    
    }    
        
        
        
        
    if($ok){    
        $elemId = createElement($typeElem, $elem);    
            $retour = createLink($titre,$message,$elemId);
        if($retour){ header('Location: showAllLink.php'); }    
    }    
        
?>    
    
        