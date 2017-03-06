<?php 
//classe passerelle entre les objets Column et la BD // 
class ColumnsManager extends DatabaseManager
{
	public function addColumn($column)
	{
		//todo ...
	}
	//fonction qui met à jour les informations de l'objet Task en BD
	public function updateColumn($column)
	{
		$prepared = $this->db->prepare('UPDATE `columns` SET `column_label`= :column_label,`column_order`= :column_order, WHERE `column_id` = :column_id');
		$prepared->bindValue(':column_label',$column->getColumn_label());
		$prepared->bindValue(':column_order',$column->getColumn_order());
		$prepared->bindValue(':column_id',$column->getColumn_id());
		$isDone = $prepared->execute();
		return $isDone;
	}
	//fonction qui récupère toutes les colonnes et les retourne sous forme de tableau d'objets Column 
	public function getColumns()
	{
		$columns = array();
		$req = $this->db->prepare('SELECT * FROM `columns`');
		if($req->execute())
		{	
			$result = $req->fetchAll();
			foreach($result as $row_datas)
			{
				$column = new Column($row_datas);
				
				$columns[] = $column;
			}
		}
		return $columns;
	}
	public function getDefaultColumn()
	{
		$prepared = $this->db->prepare('SELECT `column_id` FROM `columns` WHERE `column_order` = 1');
		$prepared->execute();
		$result = $prepared->fetch();
		return $result;
	}
}
?>