<?php 
	include_once("../commons/commonBegin.php");
	include_once("FontawesomeController.php");
?>
<div class='container'>
<h2>Nouveau Fontawesome</h2>
<div class="alert alert-warning">Voir la <a href="http://fontawesome.io/cheatsheet/">Cheatsheet fa</a> ou la <a href="http://l-lin.github.io/font-awesome-animation/">Cheatsheet animated fa</a>  si besoin d'ajouter de nouvelles icones.</div>
	<form id='formNew' action='createFontawesome.php' method='POST'>
		 <label for='nom'>nom</label>
		 <input type='text' id='nom' name='nom' class='form-control'> <br>
		 <label for='code'>code</label>
		 <input type='text' id='code' name='code' class='form-control'> <br>
	</form>
		<div class='row'><div class='col-md-6'><button type='submit' form='formNew' class='btn btn-block btn-success'>Nouveau</button></div>
		<div class='col-md-6'><a href='showAllFontawesome.php'><button class='btn btn-block btn-primary'>Retour</button></a></div></div> 
</div>

 
 
<?php 
	include_once("../commons/commonEnd.php");
?> 
