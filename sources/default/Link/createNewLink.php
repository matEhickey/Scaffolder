<?php 
	include_once("../commons/commonBegin.php");
	include_once("LinkController.php");

	include_once("../Fontawesome/FontawesomeController.php");
	$icons = getFontawesome();?>

<div class='container' style='padding-bottom: 30px;'>
	<div class='col-md-6'>
		<h2>Nouveau Link</h2>

		<form id='formNew' action='createLink.php' method='POST'  enctype="multipart/form-data">
		 <label for='titre'>titre</label>
		 <input type='text' id='titre' name='titre' class='form-control' onkeyup='keyUptitre()'> <br>
		 <label for='message'>message</label>
		 <textarea rows='4' id='message' name='message' class='form-control' onkeyup='keyUpmessage()'> </textarea><br>
		 <label for='elem'>elem</label>
            <label for='typeElem'>Type</label>            <select id="selection" name="typeElem" form="formNew" class='form-control' onchange="changeSelection()">
              <option value='0' selected disabled>Choose here</option>
              <option value='1'>Image</option>
              <option value='2'>Iframe</option>
              <option value='3'>Font-Awesome</option>
              <option value='4'>HTML</option>
            </select>
            
            <div class="form-group">
                <label for='elem'>elem</label>
                <div id="elemInput"></div> <br>
            </div>

                		</form>

		<div class='row'><div class='col-md-6'><button type='submit' form='formNew' class='btn btn-block btn-success'>Nouveau</button></div>
		<div class='col-md-6'><a href='showAllLink.php'><button class='btn btn-block btn-primary'>Retour</button></a></div></div> 
	</div>
	<div class='col-md-6' style='margin-top: 20px;'>
		<div class="panel panel-primary">    
			<div class="panel-heading" id='titreOut'></div>   
			<div class="panel-body">   
				<p id='messageOut'></p>     
				<img class='img-responsive' id='elemOut' style='display: none;'></p>                <div id='iconOut' align='center' style='display: none;'></div>                <div id='iframeOut' class='iframe-responsive-wrapper' style='display: none;'> </div>                    			</div>   
		</div>   
	</div>
</div>
<script>     
	function keyUptitre(){    
		//console.log(document.getElementById("titre").value);     
		document.getElementById("titreOut").innerHTML = escapeHtml(document.getElementById("titre").value);     
	}     
	function keyUpmessage(){    
		//console.log(document.getElementById("message").value);     
		document.getElementById("messageOut").innerHTML = escapeHtml(document.getElementById("message").value);     
	}     
	     
    function escapeHtml(text) {
      var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
      };      return text.replace(/[&<>"']/g, function(m) { return map[m]; }).replace(/(\r\n|\n|\r)/gm, "<br>");
    }
 
    var chaineFile = "<input type='file' onchange='changeImage()' form='formNew' accept='image/*' id='elem' name='elem' class='form-control'>";   
    var chaineIframe = "<input type='text' onchange='changeIframe()' form='formNew' id='elem' name='elem' class='form-control'>";   
    var chaineHTML = "<textarea rows='5' form='formNew' id='elem' name='elem' class='form-control'></textarea>";   
    var chaineFontAwesome = "<select onchange='changeFontIcon()' style=\"font-family: 'FontAwesome', Arial;\" id='elem' name='elem' form='formNew' class='form-control'>"   
        +"<option value='0' selected disabled>Choose here</option>"
<?php   
            foreach($icons as $icon){   
                echo("+\"<option value=\\\"".$icon["nom"]."\\\"   >  ".str_replace("&amp;","&",$icon["code"])." :  ".$icon['nom']."</option>  \" \n ");    
            }   
?>   
+"</select>";         
     function changeSelection(){   
        razPrevis(); 
        switch($("#selection")[0].selectedOptions[0].value) {   
             case '1':   
                 document.getElementById("elemInput").innerHTML = chaineFile;   
                 break;   
             case '2':   
                 document.getElementById("elemInput").innerHTML = chaineIframe;   
                 break;   
             case '3':   
                 document.getElementById("elemInput").innerHTML = chaineFontAwesome;   
                 break;   
             case '4':   
                 document.getElementById("elemInput").innerHTML = chaineHTML;   
                 break;   
        }   
    }   
                
     function changeImage(){   
         razPrevis(); 
        var input = document.getElementById('elem');   
         var fReader = new FileReader();   
         fReader.readAsDataURL(input.files[0]);   
         fReader.onloadend = function(event){   
             var img = document.getElementById('elemOut');   
             img.src = event.target.result;   
         }   
         document.getElementById("elemOut").style.display = "block";   
    }   
                
      function changeFontIcon(){   
        razPrevis();   
        var chaine = $("#elem")[0].selectedOptions[0].innerHTML.split(" ");    
        var fa = getFontsInSelected(chaine);   
        var icone = "<i style='color: rgb(70,70,70);' class='fa fa-5x fa-border "+fa+"'></i>";   
        document.getElementById("iconOut").innerHTML = icone;   
        document.getElementById("iconOut").style.display = "block";   
     }   
        
     function razPrevis(){   
         document.getElementById('iconOut').style.display = "none";   
         document.getElementById('elemOut').style.display = "none";   
         document.getElementById('iframeOut').style.display = "none";   
     }   
        
     function changeIframe(){   
        razPrevis(); 
        var chaine = "<img class='iframe-ratio' src='data:image/gif;base64,R0lGODlhEAAJAIAAAP///wAAACH5BAEAAAAALAAAAAAQAAkAAAIKhI+py+0Po5yUFQA7'/>";   
        chaine+= "<iframe src='"+document.getElementById('elem').value+"' width='640' height='360' frameborder=0 webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";   
        document.getElementById('iframeOut').innerHTML = chaine;   
        document.getElementById('iframeOut').style.display = "block";   
     }   
                 
     function getFontsInSelected(arrayString){     
        var temp = arrayString.reverse();     
        var result = '';     
             
        var result1 = [];     
        var ended = false;     
        for(var i = 0; i< temp.length; i+=1) {     
            if((temp[i])&&(!ended)){     
                result1.push(temp[i]);     
            }     
            else if(!(temp[i])){     
                ended = true;     
            }     
        }     
        result1 = result1.reverse();     
        for(var i = 0; i< result1.length; i+=1) {     
            result += (temp[i]+' ');     
        }     
        return(result.toString());     
     }     
            
</script>     


<?php 
	include_once("../commons/commonEnd.php");
?> 
