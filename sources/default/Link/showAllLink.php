<?php 
	include_once("../commons/commonBegin.php");
	include_once("LinkController.php");
	$Links = getAllLink(); 
?> 

 
 
<div class="container">
<!-- Tableau d'affichage --> 
<div class='row'>
<div class='col-md-8'><h2>Affichage de la table Link</h2></div><div class='col-md-2'><a href='index.php'><button class='btn btn-block btn-primary'>Afficher</button></a></div><div class='col-md-2'><a href='createNewLink.php'><button class='btn btn-block btn-success'>Nouveau</button></a></div></div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>titre</th>
			<th width='40%'>message</th>
			<th>Element</th>
			<th>Modification</th>
			<th>Suppression</th>
		</tr>
	<thead>
	<tbody>


<?php
	foreach($Links as $Link){
		echo("<tr>\n");
	echo("<form id='form".$Link['id']."' action='modifyLink.php' method='POST'>");
			echo("<td>".$Link["id"]."</td>\n");
			echo("<input type='hidden' name='id' value='".$Link['id']."'>\n");
			echo("<td><input type='text' class='form-control' value='".$Link["titre"]."' name='titre'></td>\n");
			echo("<td><textarea rows='4' class='form-control' name='message'>".$Link["message"]."</textarea></td>\n");
	echo("</form>\n");
			echo("<td><a href='../Element/showElem.php?id=".$Link["elem"]."&table=Link&tableId=".$Link['id']."'><button class='btn btn-primary'>Elément</button></a></td>");
			echo("<td><button type='submit' form='form".$Link['id']."' class='btn btn-block btn-warning'>Modifier</button></td>\n");
			echo("<td><a href='deleteLink.php?id=".$Link['id']."'><button class='btn btn-block btn-danger'>Supprimmer</button></td>\n");
		echo("</tr>\n");
	}

?> 
	</tbody>

</table>
</div>

 
 
<?php 
	include_once("../commons/commonEnd.php");
?> 
