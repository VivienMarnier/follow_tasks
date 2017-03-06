<?php
//classe objet représentant les Colonnes pour notre suivi d'activités
class Column
{
	private $column_id;
	private $column_label;
	private $column_order;
	private $column_tasks;
	private $column_nb_tasks;
	
	use HydrateObjectTrait;
	
	public function __construct($datas = null)
	{
		$this->column_tasks = array();
		if($datas != null)
		{
			$this->hydrate($datas);
		}
	}
	
	//setter
	public function setColumn_id($value)
	{
		$this->column_id = $value;
	}
	public function setColumn_label($value)
	{
		$this->column_label = $value;
	}
	public function setColumn_order($value)
	{
		$this->column_order = $value;
	}
	public function setColumn_tasks($value)
	{
		$this->column_tasks = $value;
	}
	public function setColumn_nb_tasks($value)
	{
		$this->column_nb_tasks = $value;
	}
	//getter
	
	public function getColumn_id()
	{
		return intval($this->column_id);
	}
	public function getColumn_label()
	{
		return $this->column_label;
	}
	public function getColumn_order()
	{
		return $this->column_order;
	}
	public function getColumn_tasks()
	{
		if(empty($this->column_tasks))
		{
			if($this->column_id != null)
			{
				$task_manager = new TaskManager();
				$this->column_tasks = $task_manager-> getTasksByColumn($this->column_id);
			}
		}
		return $this->column_tasks;
	}
	public function getColumn_nb_tasks()
	{
		if($this->column_nb_tasks == null)
		{
			$task_manager = new TaskManager();
			$this->column_nb_tasks = $task_manager->countTasksByColumn($this->column_id);
		}
		return $this->column_nb_tasks;
	}
}
?>