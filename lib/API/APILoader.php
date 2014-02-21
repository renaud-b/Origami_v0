<?php
/**
 * Framework Origami
 * Chargement d'une classe d'API
 * @author Renaud Bataille
 */

class APILoader
{
	private static $iList = array();

	/**
		Retourne une instance de l'api qui a pour nom $name
	*/
	public static function GetInstance($name)
	{
		if(array_key_exists($name, self::$iList))
		{
			return self::$iList[$name];
		}
		else
		{
			$path = API_PATH . DS . ucfirst($name) . DS . 'index.php';
			if(file_exists($path))
			{
				require_once $path;
				self::$iList[$name] = new $name();
				return self::$iList[$name];
			}
		}
	}
}

?>