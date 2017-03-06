<?php
class Vue
{
	private $file;
	private $title;
	
	public function __construct($action)
	{
		$this->fichier = "vues/vue" . ucfirst($action) . ".php";
	}
	// Génère et affiche la vue
	public function generer($donnees) 
	{
		// Génération de la partie spécifique de la vue
		$contenu = $this->genererFichier($this->fichier, $donnees);
		// Génération du gabarit commun utilisant la partie spécifique
		$vue = $this->genererFichier('vues/gabarit.php',
		array('titre' => $this->title, 'contenu' => $contenu));
		// Renvoi de la vue au navigateur
		echo $vue;
	}
	// Génère un fichier vue et renvoie le résultat produit
	private function genererFichier($fichier, $donnees) 
	{
		if (file_exists($fichier)) 
		{
			// Rend les éléments du tableau $donnees accessibles dans la vue
			extract($donnees);
			// Démarrage de la temporisation de sortie
			ob_start();
			// Inclut le fichier vue
			// Son résultat est placé dans le tampon de sortie
			require $fichier;
			// Arrêt de la temporisation et renvoi du tampon de sortie
			return ob_get_clean();
		}
		else 
		{
			throw new Exception("Fichier '$fichier' introuvable");
		}
	}
}
?>