<?php
//classe passerelle entre les objets Task et la BD // 
class TaskManager extends DatabaseManager
{
	//fonction qui enregistre les informations de l'objet Task en BD
	public function addTask($task)
	{
		$prepared = $this->db->prepare('INSERT INTO `tasks` (`task_description`,`task_column_id`) VALUES(?,?)');
		$isDone = $prepared->execute(array($task->getTask_description(),$task->getTask_column_id()));
		return $isDone;
	}
	//fonction qui met à jour les informations de l'objet Task en BD
	public function updateTask($task)
	{
		$prepared = $this->db->prepare('UPDATE `tasks` SET `task_description`= :task_description,`task_column_id`= :task_column_id WHERE `task_id` = :task_id');
		$prepared->bindValue(':task_description',$task->getTask_description());
		$prepared->bindValue(':task_column_id',$task->getTask_column_id());
		$prepared->bindValue(':task_id',$task->getTask_id());
		$isDone = $prepared->execute();
		return $isDone;
	}
	public function deleteTask($task_id)
	{
		$prepared = $this->db->prepare('DELETE FROM `tasks` WHERE `task_id` = :task_id');
		$isDone = $prepared->execute(array(':task_id' => $task_id));
		return $isDone;
	}
	public function getTaskById($task_id)
	{
		$prepared = $this->db->prepare('SELECT * FROM `tasks` WHERE `task_id` = :task_id');
		if($prepared->execute(array(':task_id' => $task_id)))
		{
			$row = $prepared->fetch();
			$count = $prepared->rowCount();
			if($count > 0)
			{
				$task = new Task($row);
				return $task;
			}
			else
			{
				throw new Exception('La tâche '.$user_id. ' n\'existe pas.');
			}
		}
	}
	//fonction qui récupère toutes les tâches enregistrées pour une colonne
	public function getTasksByColumn($column_id)
	{
		$prepared = $this->db->prepare('SELECT * FROM `tasks` WHERE `task_column_id` = :task_column_id');
		if($prepared->execute(array(':task_column_id' => $column_id)))
		{
			$result = $prepared->fetchAll();
			$tasks = array();
			foreach($result as $row_datas)
			{
				$task = new Task($row_datas);
				$tasks[$task->getTask_id()] = $task;
			}
			return $tasks;
		}
	}
	public function countTasksByColumn($column_id)
	{
		$prepared = $this->db->prepare('SELECT COUNT(*) FROM `tasks` WHERE `task_column_id` = :task_column_id');
		if($prepared->execute(array(':task_column_id' => $column_id)))
		{
			$result = $prepared->fetch();
			return $result[0];
		}
	}
}
?>