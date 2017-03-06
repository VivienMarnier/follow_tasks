<?php
//classe objet représentant les tâches pour notre suivi d'activités
class Task
{
	private $task_id;
	private $task_description;
	private $task_column_id;
	
	use HydrateObjectTrait;
	
	//constructeur
	public function __construct($datas = null)
	{
		if($datas != null)
		{
			$this->hydrate($datas);
		}
	}
	
	//setter
	public function setTask_id($value)
	{
		$this->task_id = $value;
	}
	public function setTask_description($value)
	{
		$this->task_description = $value;
	}
	public function setTask_column_id($value)
	{
		$this->task_column_id = $value;
	}
	
	
	//getter
	public function getTask_id()
	{
		return intval($this->task_id);
	}
	public function getTask_description()
	{
		return $this->task_description;
	}
	public function getTask_column_id()
	{
		return intval($this->task_column_id);
	}
	
	//methods
	public function getEditLink()
	{
		return 'index.php?controleur=task&action=edit';
	}
	public function getDeleteLink()
	{
		return 'index.php?controleur=task&action=delete&task_id=' .$this->task_id;
	}
	public function addTask()
	{
		$task_manager = new TaskManager();
		$this->setTask_column_id($this->getDefaultColumn());
		$task_manager->addTask($this);
	}
	public function updateTask()
	{
		$task_manager = new TaskManager();
		$task_manager->updateTask($this);
	}
	
	private function getDefaultColumn()
	{
		$col_manager = new ColumnsManager();
		return $col_manager->getDefaultColumn();
	}
}

?>