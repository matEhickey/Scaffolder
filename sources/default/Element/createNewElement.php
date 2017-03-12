<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("../commons/commonBegin.php");
	include_once("ElementController.php");
	include_once("../Fontawesome/FontawesomeController.php");
    
    $icons = getFontawesome();
    
?>
<div class='container'>
<h2>Nouveau Element</h2>
	<form id='formNew' action='createElement.php' method='POST' enctype="multipart/form-data">
		 
	</form>
    
    <label for='type'>Type</label>
    <select id="selection" name="type" form="formNew" class='form-control' onchange="changeSelection();">
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
    
    <div class='row'><div class='col-md-6'><button type='submit' form='formNew' class='btn btn-block btn-success'>Nouveau</button></div>
    <div class='col-md-6'><a href='showAllElement.php'><button class='btn btn-block btn-primary'>Retour</button></a></div></div> 
</div>


<script>
    
    var chaineFile = "<input type='file' form=\"formNew\" accept=\"image/*\" id='elem' name='elem' class='form-control'>";
    var chaineIframe = "<input type='text' form=\"formNew\" id='elem' name='elem' class='form-control'>";
    var chaineHTML = "<textarea rows='5' form=\"formNew\" id='elem' name='elem' class='form-control'></textarea>";
    var chaineFontAwesome = "<select style=\"font-family: 'FontAwesome', Arial;\" id='elem' name=\"elem\" form=\"formNew\" class='form-control' onchange=\"changeSelectedElem();\">"
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
        //console.log($("#elem")[0].selectedOptions[0].value);
    }


</script>

 
 
<?php 
	include_once("../commons/commonEnd.php");
?> 
