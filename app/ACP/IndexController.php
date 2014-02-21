<?php


class IndexController extends ACPController
{
	/*
	 *  protected $_sharedData = null; // Données partagés (dont l'instance de classe HttpData)
	 *	protected $_view = null; // Instance de la vue en cours
	 *	protected $_user = null;
	 *	protected $_db = null;
	 *
	 */

	public function init()
	{
		/*
			Connexion à la base de donnée => $this->_db->connect(array('host'=>'localhost', 'login'=>'root', 'pass'=>'', 'db'=>'origami'));    
		*/
		
		$this->_view->assign('test', 'test_variable'); // Cette variable sera disponible pour toutes les actions
	}
	public function indexAction()
	{
		$this->_view->assign('var', 'hello world'); // Celle ci sera disponible uniquement pour l'action 'index'
		$this->_view->setLayout('main');
		$this->_view->setContent('index');
	}
	public function defaultAction()
	{
		$this->_view->setLayout('main');
		$this->_view->setContent('index');
	}
	public function testAction()
	{
		
		$this->_view->setLayout('main');
		$this->_view->setContent('test');
	}

}
