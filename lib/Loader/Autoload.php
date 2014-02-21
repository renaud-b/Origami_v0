<?php
/**
 * Framework Origami
 * Loader
 * Classe d'autoload permet de charger les subcontroller
 * @author Renaud Bataille
 */

defined('SEC_TOK') or die('Access Denied');

class Loader
{
	static public function autoloader($name)
	{
		$path = ACP_PATH . DS . ucfirst($name) . '.php';
		require_once $path;
	}
}

?>