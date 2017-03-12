<?php 
	include_once("../commons/commonBegin.php");
	include_once("ElementController.php");
	$Elements = getElement(); 
?> 

 
 
<div class="container">
<!-- Tableau d'affichage --> 
<div class='row'>
<div class='col-md-8'><h2>Affichage de la table Element</h2></div><div class='col-md-2'><a href='createNewElement.php'><button class='btn btn-block btn-success'>Nouveau</button></a></div></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>elem</th>
			<th>Modification</th>
			<th>Suppression</th>
		</tr>
	<thead>
	<tbody>


<?php
	foreach($Elements as $Element){
		echo("<tr>\n");
			echo("<td>".$Element["id"]."</td>\n");
			echo("<input type='hidden' name='id' value='".$Element['id']."'>\n");
			echo("<td>");
                afficheElement($Element["id"]);
            echo("</td>\n");
			echo("<td><a href='showElem.php?id=".$Element['id']."'><button class='btn btn-block btn-warning'>Modifier</button></a></td>\n");
			echo("<td><a href='deleteElement.php?id=".$Element['id']."'><button class='btn btn-block btn-danger'>Supprimmer</button></td>\n");
		echo("</tr>\n");
	}

?> 
	</tbody>

</table>
</div>

 
 
<?php 
	include_once("../commons/commonEnd.php");
?> 
