<?php
/**
 * 	Framework Origami
 * 	classe abstraite ACPController
 *  servant de modèle a tous les Sub-Controller
 * @author Renaud Bataille
 *
 */
defined('SEC_TOK') or die('Access Denied');

abstract class ACPController
{
	protected $_sharedData = null; // Données partagés (dont l'instance de classe HttpData)
	protected $_view = null; // Instance de la vue en cours
	protected $_user = null;
	protected $_db = null;
	/**
	 * Constructeur de classe hydrate la classe avec des données pouvant etre utiles.
	 * @param mixed $sharedData
	 * @param View $view
	 */
	public function __construct($sharedData, View $view)
	{
		$this->_sharedData = $sharedData;
		$this->_view = $view;
		
		/*
			Connexion à la base de donnée pour tous les controller => $this->_db->connect(array('host'=>'localhost', 'login'=>'root', 'pass'=>'', 'db'=>'origami'));    
		*/
		
	}
	public function __destruct(){
		/*
		 Deconnection de la base de donnée => $this->_db->disconnect();
		 */
	}
}


?>
