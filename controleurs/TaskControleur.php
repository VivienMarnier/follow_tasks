<?php
class TaskControleur
{
	public function addAction()
	{
		if((isset($_POST['task_description'])) && (strlen(trim($_POST['task_description'])) > 0))
		{
			$task = new Task($_POST);
			$task->addTask();
			header('Location: index.php');	
		}
		else
		{
			throw new Exception('La description est manquante pour l\'ajout d\une tâche');
		}
	}
	public function update_columnAction()
	{
		if(isset($_POST['task_column_id'],$_POST['task_id']))
		{
			$new_column_id = Tools::check_param_id($_POST['task_column_id']);
			$task_id = Tools::check_param_id($_POST['task_id']);
			$task_manager = new TaskManager();
			$task = $task_manager->getTaskById($task_id);
			$task->setTask_column_id($new_column_id);
			$task->updateTask();
			header('Location: index.php');
		}
		else
		{
			throw new Exception('Les données pour mettre à jour la tâche sont incomplètes.');
		}
	}
	public function update_descriptionAction()
	{
		if(isset($_POST['task_id'],$_POST['task_description']))
		{
			$task_id = Tools::check_param_id($_POST['task_id']);
			$task_manager = new TaskManager();
			$task = $task_manager->getTaskById($task_id);
			$task->setTask_description($_POST['task_description']);
			$task->updateTask();
			header('Location: index.php');
		}
		else
		{
			throw new Exception('Les données pour mettre à jour la tâche sont incomplètes.');
		}
	}
	public function deleteAction()
	{
		if(isset($_GET['task_id']))
		{
			$task_id = Tools::check_param_id($_GET['task_id']);
			$task_manager = new TaskManager();
			$task_manager->deleteTask($task_id);
			header('Location: index.php');			
		}
		else
		{
			throw new Exception('L\'identifiant de la tâche a supprimer est inccorect.');
		}
	}
}
?>