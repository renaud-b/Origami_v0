<?php
/**
 * 	Framework Origami
 * 	classe abstraite IDataBase
 *  fournis un modele pour les classe des different SGBD
 * @author Renaud Bataille
 *
 */
defined('SEC_TOK') or die('Access Denied');

abstract class IDataBase
{
	protected $_dbHandle = null; // pointeur vers la bdd
	protected $_result = null; // resultat de la requete

	public function __construct()
	{

	}

	abstract public function connect(array $params);
	abstract public function query($query_string);
	abstract public function exec($query_string);
	abstract public function disconnect();


    /**
		Permet de controller l'acces des scripts a la base de données
	*/
	protected function ControlQuery($query_string){
		$file = $this->getTopScript();
		$scriptAccess = PermissionManager::getByName($file);
		if(strpos($query_string, "INSERT") !== false || strpos($query_string, "UPDATE") !== false || strpos($query_string, "DELETE") !== false){
			if($scriptAccess != 'write_access' && $scriptAccess != "read_write_access"){
				QueryViewer::getInstance()->AddElement("Script \"" . $file . "\" try to write database but don't have permission, this event have been logged");
			}
		}
		else if(strpos($query_string, "SELECT") !== false){
			if($scriptAccess != 'read_access' && $scriptAccess != "read_write_access"){
				QueryViewer::getInstance()->AddElement("Script \"" . $file . "\" try to read database but don't have permission, this event have been logged");
			}
		}
		return true;
	}
	/**
		Recupére le nom du script qui utilise la DB
	*/
	private function getTopScript() {
		$backtrace = debug_backtrace();
		$file = $backtrace[2]['file'];
		$top_frame = basename($file);
		return $top_frame;
	}

}



?>