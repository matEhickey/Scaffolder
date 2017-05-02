#!/usr/bin/python
# -*- coding: latin-1 -*-

#programme de scaffolding

#generateur de vues

class viewGenerator:

    def __init__(self,table):
        self.table = table
    
    
    def createIndex(self,file,attributs):
        file.write("<?php \n")
        file.write("\tinclude_once(\"../commons/commonBegin.php\");\n")
        file.write("\tinclude_once(\"../Element/ElementController.php\");\n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t$"+self.table+"s = getAll"+self.table+"();\n\n")
        
        file.write("\t$nbCol = 3; //1, 2, 3, 4  \n")

        file.write("?>  \n\n")
        
        file.write("<div class=\"container\">  \n")
        file.write("\t<div class='grid' id='grid'>  \n")
        file.write("\t\t<?php  \n")
        file.write("\t\t\tforeach($"+self.table+"s as $"+self.table+"){  \n")
        file.write("\t\t\t?>  \n\n")
        
        file.write("\t\t\t<div class=\"box\">  \n")
        file.write("\t\t\t\t<div class=\"panel panel-primary\">  \n")
        file.write("\t\t\t\t\t<div class=\"panel-heading\"><?php echo($"+self.table+"[\""+attributs[1]+"\"]);?></div>  \n")
        file.write("\t\t\t\t\t<div class=\"panel-body\">  \n")
        file.write("\t\t\t\t\t\t<?php  \n")
        
        i=0
        for attr in attributs:
            if(i>1):
                if(not(attr=="elem")):
                    file.write("\t\t\t\t\t\t\techo(\"<p>\".str_replace(\"\\n\",\"<br>\",$"+self.table+"[\""+attr+"\"]).\"</p>\");  \n")
                else:
                    file.write("\t\t\t\t\t\t\tafficheElement($"+self.table+"[\""+attr+"\"]); \n")
            i+=1
        
        
        
        file.write("\t\t\t\t\t\t?>  \n")
        file.write("\t\t\t\t\t</div>  \n")
        file.write("\t\t\t\t</div>  \n\n")
        file.write("\t\t\t</div>  \n\n")
        
        
        
        file.write("\t\t<?php  \n")
        file.write("\t\t\t}  \n")
        file.write("\t\t?>  \n\n")
        
        
        file.write("\t</div>  \n\n")
        file.write("</div>  \n\n")
        
        file.write("<link href='../assets/savior.css' rel='stylesheet'/>\n\
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js'></script>\n\
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/savvior/0.5.0/savvior.min.js'></script>\n")

        file.write("<script type='text/javascript' src='../assets/initSavior<?php echo($nbCol);?>Col.js'></script>  \n\n")
        
        
        file.write("<?php  \n")
        file.write("\tinclude_once(\"../commons/commonEnd.php\");  \n")
        file.write("?>  \n")

    def createShowAll(self,file,atributs):
        asElem = False
        for attr in atributs:
            if(attr == "elem"):
                asElem = True
        
        file.write("<?php \n")
        file.write("\tinclude_once(\"../commons/commonBegin.php\");\n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t$"+self.table+"s = getAll"+self.table+"(); \n")
        file.write("?> \n")
        
        
        file.write("\n \n \n")
        file.write("<div class=\"container\">\n")
        file.write("<!-- Tableau d'affichage --> \n")
        file.write("<div class='row'>\n")
        file.write("<div class='col-md-8'><h2>Affichage de la table "+self.table+"</h2></div>")
        file.write("<div class='col-md-2'><a href='index.php'><button class='btn btn-block btn-primary'>Afficher</button></a></div>")
        file.write("<div class='col-md-2'><a href='createNew"+self.table+".php'><button class='btn btn-block btn-success'>Nouveau</button></a></div>")
        file.write("</div>\n")
        
        file.write("<table class=\"table table-striped\">\n")
        
        file.write("\t<thead>\n")
        file.write("\t\t<tr>\n")
        
        for attr in atributs:
            if(not(attr == "message" or attr == "description" or attr == "descr" or attr == "elem")):
                file.write("\t\t\t<th>"+attr+"</th>\n")
            elif(not(attr == "elem")):
                file.write("\t\t\t<th width='40%'>"+attr+"</th>\n")
        
        if(asElem):
            file.write("\t\t\t<th>Element</th>\n")
        file.write("\t\t\t<th>Modification</th>\n")
        file.write("\t\t\t<th>Suppression</th>\n")
        
        file.write("\t\t</tr>\n")
        file.write("\t<thead>\n")
        
        file.write("\t<tbody>\n")
        
        
        file.write("\n\n<?php\n")
        file.write("\tforeach($"+self.table+"s as $"+self.table+"){\n")
        file.write("\t\techo(\"<tr>\\n\");\n")
        
        i=0
        file.write("\techo(\"<form id='form\".$"+self.table+"['id'].\"' action='modify"+self.table+".php' method='POST'>\");\n")
        for attr in atributs:
            if(not(i == 0)):
                if((attr == "message" or attr == "description" or attr == "descr")):
                    file.write("\t\t\techo(\"<td><textarea rows='4' class='form-control' name='"+attr+"'>\".$"+self.table+"[\""+attr+"\"].\"</textarea></td>\\n\");\n")
                elif(not(attr=="elem")):
                    file.write("\t\t\techo(\"<td><input type='text' class='form-control' value='\".$"+self.table+"[\""+attr+"\"].\"' name='"+attr+"'></td>\\n\");\n")
            else:
                file.write("\t\t\techo(\"<td>\".$"+self.table+"[\""+attr+"\"].\"</td>\\n\");\n")
                file.write("\t\t\techo(\"<input type='hidden' name='id' value='\".$"+self.table+"['id'].\"'>\\n\");\n")
            i+=1
        file.write("\techo(\"</form>\\n\");\n")
        if(asElem):
            file.write("\t\t\techo(\"<td><a href='../Element/showElem.php?id=\".$"+self.table+"[\""+attr+"\"].\"&table="+self.table+"&tableId=\".$"+self.table+"['id'].\"'><button class='btn btn-primary'>Elément</button></a></td>\");\n")
        file.write("\t\t\techo(\"<td><button type='submit' form='form\".$"+self.table+"['id'].\"' class='btn btn-block btn-warning'>Modifier</button></td>\\n\");\n")
        file.write("\t\t\techo(\"<td><a href='delete"+self.table+".php?id=\".$"+self.table+"['id'].\"'><button class='btn btn-block btn-danger'>Supprimmer</button></td>\\n\");\n")
        
        file.write("\t\techo(\"</tr>\\n\");\n")
        
        file.write("\t}\n")
        
        
        
        file.write("\n?> \n")
        
        file.write("\t</tbody>\n")
        
        file.write("\n</table>\n")
        
        file.write("</div>\n")
        
        
        
        
        file.write("\n \n \n")
        
        file.write("<?php \n")
        file.write("\tinclude_once(\"../commons/commonEnd.php\");\n")
        file.write("?> \n")

    def createFormNew(self,file,atributs):
        file.write("<?php \n")
        file.write("\tinclude_once(\"../commons/commonBegin.php\");\n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n\n")
        
        asElem = False
        for attr in atributs:
            if(attr == "elem"):
                asElem = True
        if(asElem):
            file.write("\tinclude_once(\"../Fontawesome/FontawesomeController.php\");\n")
            file.write("\t$icons = getFontawesome();")
        file.write("?>\n\n")
        
        file.write("<div class='container' style='padding-bottom: 30px;'>\n")
        file.write("\t<div class='col-md-6'>\n")
        file.write("\t\t<h2>Nouveau "+self.table+"</h2>\n\n")
        
        file.write("\t\t<form id='formNew' action='create"+self.table+".php' method='POST'  enctype=\"multipart/form-data\">\n")
        i=0
        for attr in atributs:
            if(i>0):
                file.write("\t\t <label for='"+attr+"'>"+attr+"</label>\n")
                if(attr == "message" or attr == "description" or attr == "descr"):  #Si l'attribut est message, description, descr
                    file.write("\t\t <textarea rows='4' id='"+attr+"' name='"+attr+"' class='form-control' onkeyup='keyUp"+attr+"()'> </textarea><br>\n")
                elif(attr == "elem"): #si l'attribut est elem
                    file.write("\
            <label for='typeElem'>Type</label>\
            <select id=\"selection\" name=\"typeElem\" form=\"formNew\" class='form-control' onchange=\"changeSelection()\">\n\
              <option value='0' selected disabled>Choose here</option>\n\
              <option value='1'>Image</option>\n\
              <option value='2'>Iframe</option>\n\
              <option value='3'>Font-Awesome</option>\n\
              <option value='4'>HTML</option>\n\
            </select>\n\
            \n\
            <div class=\"form-group\">\n\
                <label for='elem'>elem</label>\n\
                <div id=\"elemInput\"></div> <br>\n\
            </div>\n\n\
                ")
                else:
                    file.write("\t\t <input type='text' id='"+attr+"' name='"+attr+"' class='form-control' onkeyup='keyUp"+attr+"()'> <br>\n")
            i+=1
        file.write("\t\t</form>\n\n")
        file.write("\t\t<div class='row'><div class='col-md-6'><button type='submit' form='formNew' class='btn btn-block btn-success'>Nouveau</button></div>\n")
        file.write("\t\t<div class='col-md-6'><a href='showAll"+self.table+".php'><button class='btn btn-block btn-primary'>Retour</button></a></div></div> \n")
        file.write("\t</div>\n")
        
        
        
        file.write("\t<div class='col-md-6' style='margin-top: 20px;'>\n")
        file.write("\t\t<div class=\"panel panel-primary\">    \n")
        file.write("\t\t\t<div class=\"panel-heading\" id='"+atributs[1]+"Out'></div>   \n")
        file.write("\t\t\t<div class=\"panel-body\">   \n")
        
        
        i=0
        for attr in atributs:
            if(i>1):
                if(attr == "elem"):
                    file.write("\t\t\t\t<img class='img-responsive' id='elemOut' style='display: none;'></p>\
                <div id='iconOut' align='center' style='display: none;'></div>\
                <div id='iframeOut' class='iframe-responsive-wrapper' style='display: none;'> </div>\
                    ")
                else:
                    file.write("\t\t\t\t<p id='"+attr+"Out'></p>     \n")
            i+=1
        
        
        
        file.write("\t\t\t</div>   \n")
        file.write("\t\t</div>   \n")

        
        file.write("\t</div>\n")
        
        
        file.write("</div>\n")
        
        
        
        file.write("<script>     \n")
        
        i=0
        for attr in atributs:
            if((i>0)and(not(attr=="elem"))):
                file.write("\tfunction keyUp"+attr+"(){    \n")
                file.write("\t\t//console.log(document.getElementById(\""+attr+"\").value);     \n")
                file.write("\t\tdocument.getElementById(\""+attr+"Out\").innerHTML = escapeHtml(document.getElementById(\""+attr+"\").value);     \n")
                file.write("\t}     \n")
            i+=1
            

            
        
        file.write("\t     \n\
    function escapeHtml(text) {\n\
      var map = {\n\
        '&': '&amp;',\n\
        '<': '&lt;',\n\
        '>': '&gt;',\n\
        '\"': '&quot;',\n\
        \"'\": '&#039;'\n\
      };\
      return text.replace(/[&<>\"']/g, function(m) { return map[m]; }).replace(/(\\r\\n|\\n|\\r)/gm, \"<br>\");\n\
    }\n\
")


        if(asElem):
            file.write(" \n\
    var chaineFile = \"<input type='file' onchange='changeImage()' form='formNew' accept='image/*' id='elem' name='elem' class='form-control'>\";   \n\
    var chaineIframe = \"<input type='text' onchange='changeIframe()' form='formNew' id='elem' name='elem' class='form-control'>\";   \n\
    var chaineHTML = \"<textarea rows='5' form='formNew' id='elem' name='elem' class='form-control'></textarea>\";   \n\
    var chaineFontAwesome = \"<select onchange='changeFontIcon()' style=\\\"font-family: 'FontAwesome', Arial;\\\" id='elem' name='elem' form='formNew' class='form-control'>\"   \n\
        +\"<option value='0' selected disabled>Choose here</option>\"\n\
<?php   \n\
            foreach($icons as $icon){   \n\
                echo(\"+\\\"<option value=\\\\\\\"\".$icon[\"nom\"].\"\\\\\\\"   >  \".str_replace(\"&amp;\",\"&\",$icon[\"code\"]).\" :  \".$icon['nom'].\"</option>  \\\" \\n \");    \n\
            }   \n\
?>   \n\
+\"</select>\";\
        ");
        
        
        
        
        #echo("\t\t+\"<option value=\\\"".$icon["nom"]."\\\" >".str_replace("&amp;","&",$icon["code"])." :  ".$icon["nom"]."</option>\"\n");\
        
            file.write(" \n \
    function changeSelection(){   \n\
        razPrevis(); \n\
        switch($(\"#selection\")[0].selectedOptions[0].value) {   \n\
             case '1':   \n\
                 document.getElementById(\"elemInput\").innerHTML = chaineFile;   \n\
                 break;   \n\
             case '2':   \n\
                 document.getElementById(\"elemInput\").innerHTML = chaineIframe;   \n\
                 break;   \n\
             case '3':   \n\
                 document.getElementById(\"elemInput\").innerHTML = chaineFontAwesome;   \n\
                 break;   \n\
             case '4':   \n\
                 document.getElementById(\"elemInput\").innerHTML = chaineHTML;   \n\
                 break;   \n\
        }   \n\
    }   \n\
             ")
             
            file.write("   \n \
    function changeImage(){   \n \
        razPrevis(); \n\
        var input = document.getElementById('elem');   \n \
        var fReader = new FileReader();   \n \
        fReader.readAsDataURL(input.files[0]);   \n \
        fReader.onloadend = function(event){   \n \
            var img = document.getElementById('elemOut');   \n \
            img.src = event.target.result;   \n \
        }   \n \
        document.getElementById(\"elemOut\").style.display = \"block\";   \n\
    }   \n \
            ")
            
            file.write("   \n\
      function changeFontIcon(){   \n\
        razPrevis();   \n\
        var chaine = $(\"#elem\")[0].selectedOptions[0].innerHTML.split(\" \");    \n\
        var fa = getFontsInSelected(chaine);   \n\
        var icone = \"<i style='color: rgb(70,70,70);' class='fa fa-5x fa-border \"+fa+\"'></i>\";   \n\
        document.getElementById(\"iconOut\").innerHTML = icone;   \n\
        document.getElementById(\"iconOut\").style.display = \"block\";   \n\
     }   \n\
        \n\
     function razPrevis(){   \n\
         document.getElementById('iconOut').style.display = \"none\";   \n\
         document.getElementById('elemOut').style.display = \"none\";   \n\
         document.getElementById('iframeOut').style.display = \"none\";   \n\
     }   \n\
        \n\
     function changeIframe(){   \n\
        razPrevis(); \n\
        var chaine = \"<img class='iframe-ratio' src='data:image/gif;base64,R0lGODlhEAAJAIAAAP///wAAACH5BAEAAAAALAAAAAAQAAkAAAIKhI+py+0Po5yUFQA7'/>\";   \n\
        chaine+= \"<iframe src='\"+document.getElementById('elem').value+\"' width='640' height='360' frameborder=0 webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>\";   \n\
        document.getElementById('iframeOut').innerHTML = chaine;   \n\
        document.getElementById('iframeOut').style.display = \"block\";   \n\
     }   \n\
            ");
            
            file.write("     \n\
     function getFontsInSelected(arrayString){     \n\
        var temp = arrayString.reverse();     \n\
        var result = '';     \n\
             \n\
        var result1 = [];     \n\
        var ended = false;     \n\
        for(var i = 0; i< temp.length; i+=1) {     \n\
            if((temp[i])&&(!ended)){     \n\
                result1.push(temp[i]);     \n\
            }     \n\
            else if(!(temp[i])){     \n\
                ended = true;     \n\
            }     \n\
        }     \n\
        result1 = result1.reverse();     \n\
        for(var i = 0; i< result1.length; i+=1) {     \n\
            result += (temp[i]+' ');     \n\
        }     \n\
        return(result.toString());     \n\
     }     \n\
            ")


        
        file.write("\n</script>     \n")
        
        
        

        
        file.write("\n\n")

        
        file.write("<?php \n")
        file.write("\tinclude_once(\"../commons/commonEnd.php\");\n")
        file.write("?> \n")
        
    def createNew(self,file,atributs):
        # file.write("<?php \n")
        # file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        # file.write("\t//var_dump($_POST);\n\n")
        
        # i=0
        # for attr in atributs:
            # if(not(i==0)):
                # file.write("\t$"+attr+" = htmlentities($_POST['"+attr+"'], ENT_QUOTES);\n")
            # i+=1
        
        # chaineAttr = ""
        # i=0
        # for attr in atributs:
            # if(i>1):
                # chaineAttr += ", "
            # if(i>0):
                # chaineAttr += "$"+attr
            # i+=1
        
        # file.write("\t$retour = create"+self.table+"("+chaineAttr+");\n")
        # file.write("\tif($retour){ header('Location: showAll"+self.table+".php'); }\n")
        # file.write("?>\n")
        
        asElem = False
        for attr in atributs:
            if(attr == "elem"):
                asElem = True
        
        
        
        
        
        file.write("    \n\
<?php     \n\
        \n\
	include_once('"+self.table+"Controller.php');    \n\
    include_once('../Element/ElementController.php');    \n\
    \n\
	var_dump($_POST);    \n\
    var_dump($_FILES);    \n\
        \n\
        ")
        
        
        for attr in atributs:
            if((not (attr == "elem"))and(not (attr == "id"))):
                file.write("$"+attr+" = htmlentities($_POST['"+attr+"'], ENT_QUOTES);    \n")
	
        
        if(asElem):
            file.write("    \n\n\
    $typeElem = htmlentities($_POST['typeElem'], ENT_QUOTES);    \n\
	$elem = '';    \n\
        \n\
    $ok = true;    \n\
	if($_POST['typeElem'] == 1){    \n\
        $elem = htmlentities($_FILES['elem']['name'],ENT_QUOTES);    \n\
        $move = move_uploaded_file ($_FILES['elem']['tmp_name'],'../uploaded_files/'.$_FILES['elem']['name']);    \n\
        echo('moved : '.($move?'yes':'no'));    \n\
        if(!$move){$ok = false;}    \n\
    \n\
    }else{    \n\
        $elem = htmlentities($_POST['elem'], ENT_QUOTES);    \n\
    }    \n\
        \n\
        \n\
        \n\
        \n\
    if($ok){    \n\
        $elemId = createElement($typeElem, $elem);    \n\
            ");
            
            file.write("$retour = create"+self.table+"(")
            i=1
            for attr in atributs:
                if((not(attr == "elem")) and (not(attr == "id"))):
                    file.write("$"+attr)
                elif(attr == "elem"):
                    file.write("$elemId")
                    
                if(not(attr == "id")):
                    i+=1
                    
                if(i > 1 and i < len(atributs)):
                    file.write(",")
            file.write(");\n");
            file.write("\
        if($retour){ header('Location: showAll"+self.table+".php'); }    \n\
    }    \n\
        \n\
?>    \n\
    \n\
        ")
        
        else:
            
            chaineattr = ""
            i=0
            for attr in atributs:
                if(i>1):
                    chaineattr += ", "
                if(i>0):
                    chaineattr += "$"+attr
                i+=1
            
            file.write("\t$retour = create"+self.table+"("+chaineattr+");\n")
            file.write("\tif($retour){ header('Location: showAll"+self.table+".php'); }\n")
            file.write("?>\n")
        
    def createModify(self,file,atributs):
        file.write("<?php \n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t//var_dump($_POST);\n")
        
        for attr in atributs:
            if(not(attr=="elem")):
                file.write("\t$"+attr+" = htmlentities($_POST['"+attr+"'], ENT_QUOTES);\n")

        chaineAttr = ""
        i=0
        for attr in atributs:
            if((i>0)and(not(attr=="elem"))):
                chaineAttr += ", "
            if(not(attr=="elem")):
                chaineAttr += "$"+attr
            i+=1
        file.write("\tupdate"+self.table+"("+chaineAttr+");\n")
        file.write("\theader('Location: showAll"+self.table+".php');\n")
        file.write("?>\n")


    def createDelete(self,file,atributs):
        file.write("<?php \n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t//var_dump($_GET);\n")
        file.write("\t$id= $_GET['id'];\n")
        file.write("\tdelete"+self.table+"($id);\n")
        file.write("\theader('Location: showAll"+self.table+".php');\n")
        file.write("?>\n")    
        
    def createShowAllJson(self,file):
        file.write("<?php \n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t$"+self.table+"s = getAll"+self.table+"(); \n")
        file.write("\techo(json_encode($"+self.table+"s));\n")
        file.write("?>\n")    
    def createShowOneJson(self,file):
        file.write("<?php \n")
        file.write("\tinclude_once(\""+self.table+"Controller.php\");\n")
        file.write("\t $id = htmlentities($_GET['id'], ENT_QUOTES); \n")
        file.write("\t$"+self.table+" = get"+self.table+"ById($id); \n")
        file.write("\techo(json_encode($"+self.table+"));\n")
        file.write("?>\n")    
        