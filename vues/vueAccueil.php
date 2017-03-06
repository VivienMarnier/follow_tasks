<?php  
	$this->title = "Accueil - Mon suivi de planning";
?>
<div class="row">
	<?php
	if(count($columns) > 0)
	{
		foreach($columns as $column)
		{
	?>
		<!--UNE COLONNE -->
		<div class="col-md-3">
			<h2><?php echo $column->getColumn_label();?><span class="badge"><?php echo $column->getColumn_nb_tasks(); ?></span></h2>
	<?php
		if(count($column->getColumn_tasks()) > 0)
		{
			foreach($column->getColumn_tasks() as $task)
			{
	?>
				<!--UNE TACHE -->
				<div class="panel panel-default">
					<div class="panel-body">
					<div class='text-right'>
						<a href='#' data-toggle="modal" data-target="#modal<?php echo $task->getTask_id(); ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						<a href='<?php echo $task->getDeleteLink(); ?>'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					</div>
					<hr/>
					<?php echo $task->getTask_description();?>
					<p>
					<form action="index.php?controleur=task&action=update_column" method="POST">
						<select id="task_column_id" name="task_column_id" onchange="this.form.submit()">
						<?php
							foreach($columns as $column)
							{
								if($task->getTask_column_id() == $column->getColumn_id())
								{
						?>
								<option selected="selected" value="<?php echo $column->getColumn_id(); ?>"><?php echo $column->getColumn_label();?></option>
						<?php
								}
								else
								{
						?>
								<option value="<?php echo $column->getColumn_id(); ?>"><?php echo $column->getColumn_label();?></option>
						<?php
								}
						?>
								
						<?php
							}
						?>
						</select>
						<input type="hidden" id="task_id" name="task_id" value="<?php echo $task->getTask_id(); ?>">
					</form>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="modal<?php echo $task->getTask_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Ajouter</h4>
					  </div>
					  <div class="modal-body">

						<form method="POST" action="index.php?controleur=task&action=update_description">
							<div class="form-group">
								<label for="task_description">Description de la tâche</label>
								<textarea class="form-control" rows="3" id='task_description' name='task_description'><?php echo $task->getTask_description(); ?></textarea>
							</div>
						<input type="hidden" id="task_id" name="task_id" value="<?php echo $task->getTask_id(); ?>">
						<button type="submit" class="btn btn-success">Ajouter la tâche</button>
						</form>
					   
					   
					  </div>
				   
					</div>
				  </div>
				</div>
	<?php
			}
		}
		else
		{
	?>
		<div>Aucune tâche pour cette colonne.</div>
	<?php
		}
	?>
		</div>
	<?php
		}
	}
	else
	{
	?>
	<div class="col-lg-12">Le planning est vide.</div>
	<?php
	}
	?>
</div>