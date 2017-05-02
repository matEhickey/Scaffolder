<?php
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	
	include_once("ElementController.php");
    include_once("../Fontawesome/FontawesomeController.php");
    
    $icons = getFontawesome();
    
    
    
    $element = False;
    $reconstruct = False; //si l'element a du etre reconstruit
    
    try{
    
        if(isset($_GET["id"])){
            if($_GET["id"] != ""){
                $id = $_GET["id"];
                $element = getElementById($id);
            }
        }
        
        if(!$element){
            $elementId = createElement(0,"");
            
            
            $element = getElementById($elementId);
            
            reCreateElement($_GET["table"],$_GET["tableId"],$elementId);
            $reconstruct = True;
        }
    }
    catch(Exception $ex){
        var_dump($ex);
    }

    
    include_once("../commons/commonBegin.php");
    
    //var_dump($element);
?> 

<div class="container">
    <div class="col-md-6">
        <div class="jumbotron">
            <div class="row">
                <?php if($reconstruct == False){ ?>
                <h4>Élement n° <?php echo($element["id"]);?></h4>
                <strong>Type: </strong><?php 
                    switch($element["type"]){
                        case 0:
                            echo("Élément vide");
                            break;
                        case 1:
                            echo("Image");
                            break;
                        case 2:
                            echo("Iframe");
                            break;
                        case 3:
                            echo("Icone");
                            break;
                        case 4:
                            echo("HTML");
                            break;
                    }
                    ?><hr>
                <?php afficheElement($element["id"]);?></br>
                
                <?php }else{ 
                ?>
                    
                    <h4>Élement absent de la base.</h4>
                    <p>L'élement <?php echo($element["id"]); ?> a été crée a sa place</p>
                    
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="jumbotron">
            <div class="row">
            
            
                <form id='formModif' action='modifyElement.php' method='POST' enctype="multipart/form-data">
                    <input type="hidden" name="id" value='<?php echo($_GET["id"]);?>'>
                    <input type="hidden" name="table" value='<?php echo($_GET["table"]);?>'>
                </form>
                
                <label for='type'>Type</label>
                <select id="selection" name="type" form="formModif" class='form-control' onchange="changeSelection();">
                  <option value="0" selected disabled>Choose here</option>
                  <option value="1">Image</option>
                  <option value="2">Iframe</option>
                  <option value="3">Font-Awesome</option>
                  <option value="4">HTML</option>
                </select>
                
                <div class="form-group">
                    <label for='elem'>elem</label>
                    <div id="elemInput"></div> <br>
                </div>
                
                <div class='row'>
                    <button type='submit' form='formModif' class='btn btn-block btn-success'>Modifier</button>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    
    var chaineFile = "<input type='file' form=\"formModif\" accept=\"image/*\" id='elem' name='elem' class='form-control'>";
    var chaineIframe = "<input type='text' form=\"formModif\" id='elem' name='elem' class='form-control'>";
    var chaineHTML = "<textarea rows='5' form=\"formModif\" id='elem' name='elem' class='form-control'></textarea>";
    var chaineFontAwesome = "<select style=\"font-family: 'FontAwesome', Arial;\" id='elem' name=\"elem\" form=\"formModif\" class='form-control' onchange=\"changeSelectedElem();\">"
        +"<option value=\"0\" selected disabled>Choose here</option>\n"
<?php
            foreach($icons as $icon){
                echo("\t\t+\"<option value=\\\"".$icon["nom"]."\\\" >".str_replace("&amp;","&",$icon["code"])." :  ".$icon["nom"]."</option>\"\n");
            }
          
?>
        +"</select>    ";
    
    function changeSelection(){
        
        
        
        console.log($("#selection")[0].selectedOptions[0].index);
        
        switch($("#selection")[0].selectedOptions[0].index) {
            case 1:
                document.getElementById("elemInput").innerHTML = chaineFile;
                break;
            case 2:
                document.getElementById("elemInput").innerHTML = chaineIframe;
                break;
            case 3:
                document.getElementById("elemInput").innerHTML = chaineFontAwesome;
                break;
            case 4:
                document.getElementById("elemInput").innerHTML = chaineHTML;
                break;
        }
    }
    
    function changeSelectedElem(){
        console.log($("#elem")[0].selectedOptions[0].value);
    }


</script>

 



 
<?php 
	include_once("../commons/commonEnd.php");
?> 
