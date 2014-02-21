<?php
/**
 * 	Framework Origami
 * 	Origami_DB
 *  Factory permettant de recuperer une instance du BDD manager
 *  (Si la classe de base de donnée est deja chargés, renvois la version chargé plutot
 *  que de re créer un objet
 * @author Renaud Bataille
 */
defined('SEC_TOK') or die('Access Denied');

class Origami_DB
{
	private static $db_Loaded = array();

	public static function Load($needed)
	{
		if(is_string($needed))
		{
			if(array_key_exists($needed, self::$db_Loaded))
			{
				return self::$db_Loaded[$needed];
			}
			else
			{
				require_once LIB_PATH . DS . 'Db' . DS . $needed . '.php';

				if(class_exists($needed))
				{
					self::$db_Loaded[$needed] = new $needed;
					return self::$db_Loaded[$needed];
				}
				else
					return false;
			}
		}
	}
}