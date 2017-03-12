<?php  
    //include_once("../User/verifCookie.php");
    //if(!verifCookie()){header('Location: ../commons/errorSecure.php');}
    
	include_once("../commons/commonBegin.php");
	include_once("FontawesomeController.php");
	$Fontawesomes = getFontawesome(); 
?> 

 
 
<div class="container">
<!-- Tableau d'affichage --> 
<div class='row'>
<div class='col-md-8'><h2>Affichage de la table Fontawesome</h2></div><div class='col-md-4'><a href='createNewFontawesome.php'><button class='btn btn-block btn-success'>Nouveau</button></a></div></div>
<div class="alert alert-warning">Voir la <a href="http://fontawesome.io/cheatsheet/">Cheatsheet</a> si besoin d'ajouter de nouvelles icones.</div>


<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>nom</th>
			<th>code</th>
            <th>Preview</th>
			<th>Modification</th>
			<th>Suppression</th>
		</tr>
	<thead>
	<tbody>


<?php
	foreach($Fontawesomes as $Fontawesome){
		echo("<tr>\n");
	echo("<form id='form".$Fontawesome['id']."' action='modifyFontawesome.php' method='POST'>");
			echo("<td>".$Fontawesome["id"]."</td>\n");
			echo("<input type='hidden' name='id' value='".$Fontawesome['id']."'>\n");
			echo("<td><input type='text' class='form-control' value='".$Fontawesome["nom"]."' name='nom'></td>\n");
			echo("<td><input type='text' class='form-control' value='".$Fontawesome["code"]."' name='code'></td>\n");
            echo("<td><i class='fa fa-3x ".$Fontawesome["nom"]."'  aria-hidden='true'></i></td>");
	echo("</form>\n");
			echo("<td><button type='submit' form='form".$Fontawesome['id']."' class='btn btn-block btn-warning'>Modifier</button></td>\n");
			echo("<td><a href='deleteFontawesome.php?id=".$Fontawesome['id']."'><button class='btn btn-block btn-danger'>Supprimmer</button></td>\n");
		echo("</tr>\n");
	}

?> 
	</tbody>

</table>
</div>

 
 
<?php 
	include_once("../commons/commonEnd.php");
?> 
