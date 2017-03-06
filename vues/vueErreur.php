<?php 
$this->title = "Une erreur est survenue";


?>
<div class='col-lg-12'>
	<div class='col-lg-6 col-lg-offset-3'>
		<p class='alert alert-danger'>
		<?php echo "Une erreur est survenue sur le site internet";?>
		<br/>
		<strong><?php echo $erreur;?></strong>
		</p>
	</div>
</div>