<?php
/**
 * 	Framework Origami
 * 	MySqlDB
 *  classe utilisant le SGBD MySql pour la connection a la BDD
 * @author Renaud Bataille
 */
defined('SEC_TOK') or die('Access Denied');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'IDataBase.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'QueryViewer.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'PermissionManager.php';

class MySqlDB extends IDataBase
{
	/**
	 * Connect()
	 * Cette fonction attend comme paramettre un tableau contenant les informations
	 * necessaires a la connection a la db. Puis, si toutes les infos sont presente
	 * se connecte a la BDD
	 * @param array $params
	 */
	public function connect(array $params)
	{
		if(array_key_exists('host', $params)
				&& array_key_exists('login', $params)
				&& array_key_exists('pass', $params)
				&& array_key_exists('db', $params))
		{
				
			if($this->_dbHandle==null)
			{
				$this->_dbHandle = mysql_connect($params['host'], $params['login'], $params['pass']);
				if(!$this->_dbHandle)
				{
					// Probleme de connection a l'hote
					return false;
				}
				else
				{
					if(!mysql_select_db($params['db'], $this->_dbHandle))
					{
						// Probleme de connection a la BDD
						return false;
					}
					else
					{
						// Success
						return true;
					}
				}
			}
		}
	}
	/**
	 * isConnected()
	 * Renvois true si connected false sinon
	 */
	public function isConnected()
	{
		if($this->_dbHandle==null)
			return false;
		else
			return true;
	}
	/**
	 * Query
	 * envois une requete de type select a la base de donn�e
	 * @param $query_string
	 * @return
	 * false sur une erreur
	 * array a deux dimensions (ex: $data[0]['id'] => represente l'id de la premiere occurence trouv�)
	 */
	public function query($query_string)
	{
		if($this->_dbHandle != null)
		{
			$return_array = array();
			$count = 0;
			if(!empty($query_string) && is_string($query_string))
			{
                                if($this->ControlQuery($query_string)){
                                        $this->_result = mysql_query($query_string);
                                        if($this->_result==false)
                                        {
                                                return false;
                                        }
                                        else
                                        {
                                                while($return_var = mysql_fetch_array($this->_result))
                                                {
                                                        $return_array[$count] = $return_var;
                                                        $count++;
                                                }

                                                if($return_array)
                                                {
                                                        return $return_array;
                                                }
                                                else
                                                {
                                                        return false;
                                                }
                                        }
                                }
			}
			else
			{
				return false;
			}
		}
	}
	/**
	 * Exec()
	 * Envois une requete de type Update/Insert/Delete a la base de donn�e
	 * @param $query_string
	 * @return
	 * false => erreur
	 * true => success
	 */
	public function exec($query_string)
	{
		if($this->_dbHandle != null)
		{
			if(!empty($query_string) && is_string($query_string))
			{
                                if(parent::ControlQuery($query_string)){
										
                                        $this->_result = mysql_query($query_string);
										return $this->_result;
                                }
			}
			else
				return false;
		}
	}
	/**
	 * Disconnect()
	 * Deconnection.
	 */
	public function disconnect()
	{
		if($this->_dbHandle)
		{
			mysql_close($this->_dbHandle);
			$this->_dbHandle = null;
		}
	}



}