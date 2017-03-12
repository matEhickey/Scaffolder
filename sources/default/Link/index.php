<?php 
	include_once("../commons/commonBegin.php");
	include_once("../Element/ElementController.php");
	include_once("LinkController.php");
	$Links = getAllLink();

	$nbCol = 3; //1, 2, 3, 4  
?>  

<div class="container">  
	<div class='grid' id='grid'>  
		<?php  
			foreach($Links as $Link){  
			?>  

			<div class="box">  
				<div class="panel panel-primary">  
					<div class="panel-heading"><?php echo($Link["titre"]);?></div>  
					<div class="panel-body">  
						<?php  
							echo("<p>".str_replace("\n","<br>",$Link["message"])."</p>");  
							afficheElement($Link["elem"]); 
						?>  
					</div>  
				</div>  

			</div>  

		<?php  
			}  
		?>  

	</div>  

</div>  

<link href='../assets/savior.css' rel='stylesheet'/>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/enquire.js/2.1.2/enquire.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/savvior/0.5.0/savvior.min.js'></script>
<script type='text/javascript' src='../assets/initSavior<?php echo($nbCol);?>Col.js'></script>  

<?php  
	include_once("../commons/commonEnd.php");  
?>  
