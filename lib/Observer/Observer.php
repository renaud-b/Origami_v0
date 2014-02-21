<?php
/**
 * 	Framework Origami
 * 	Observer
 *  La classe Origami_Observer execute la methode update suite a une demande de la vue (sur une chargement de page)
 * @author Renaud Bataille
 *
 */

defined('SEC_TOK') or die('Access Denied');

class Observer{
	private $_subjectData = null;
	private $_mainController = null;

	/**
	 * Methode appeller par la vue pour la mise a jour de sont contenue
	 * @see IObserver::update()
	 */
	public function update(View $subject){
		$this->_subjectData = $subject->getInternalData(); //Recuperation des données de la vue
		$this->_mainController = new Origami_MainController($this->_subjectData, $subject); // Creation du Origami_MainController
		$this->_mainController->Load(); // Chargement de l'application
	}
}


