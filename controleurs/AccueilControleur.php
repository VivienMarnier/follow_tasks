<?php
class AccueilControleur
{
	public function indexAction()
	{
		$col_manager = new ColumnsManager();
		$columns = $col_manager->getColumns();
		
		// $form = new Bootstrap_Form('index.php','POST');
		// $form->beginForm();
		// $form->getInputText('Description','task_description');
		// $form->getInputHidden('controleur','task');
		// $form->getInputHidden('action','add');
		// $form->getInputSubmit('submit','Ajouter la tâche');
		// $form->endForm();
				
		$vue = new Vue('accueil');
		$donnees = array('columns'=>$columns);
		$vue->generer($donnees);
	}
}
?>