<?php
/**
 * Framework Origami
 * Subject
 * La view herite de cette classe, cela permet de notifier a l'observer qu'il faut qu'il actualise la page.
 * @author Renaud Bataille
 */

defined('SEC_TOK') or die('Access Denied');

class Subject{
	protected $_data = null;

	public function __construct(){
		$this->_observer = array();
	}

	public function attach(Observer $observer){
		array_push($this->_observer, $observer);
		$this->notify();
	}
	public function notify(){
		foreach($this->_observer as $observer){
			$observer->update($this);
		}
	}

	private $_observer = null;
}


?>