<?php
/**
 * Framework Origami
 * HttpData
 * Classe permettant la gestion des différentes requetes (POST/COOKIES/SESSION/GET)
 * possibilité de récupéré l'hote et l'Uri
 * @author Renaud Bataille
 */

defined('SEC_TOK') or die('Access Denied');

class HttpData
{
	private $_cookiesData = null;
	private $_postData = null;
	private $_getData = null;
	private $_sessionData = null;
	private $_httpHost = null;
	private $_httpUri = null;

	public function __construct()
	{
		$this->_cookiesData = $_COOKIE;
		$this->_getData = $_GET;
		$this->_postData = $_POST;
		$this->_sessionData = $_SESSION;
		$this->_httpHost = $_SERVER['HTTP_HOST'];
		$this->_httpUri = $_SERVER['REQUEST_URI'];
		
		$this->clearTab($this->_postData);
		$this->clearTab($this->_getData);
	}
	public function getHost()
	{
		return $this->_httpHost;
	}
	public function getUri()
	{
		return $this->_httpUri;
	}
	public function haveCookie()
	{
		return empty($this->cookiesData);
	}

	public function haveGet()
	{
		return (empty($this->getData)?false:true);
	}

	public function havePost()
	{
		return empty($this->_postData);
	}

	public function haveSession()
	{
		return empty($this->_sessionData);
	}

	public function getCookie($name)
	{
		return (isset($this->_cookiesData[$name])?$this->_cookiesData[$name]:false);
	}
	public function getGet($name)
	{
		return (isset($this->_getData[$name])?$this->_getData[$name]:false);
	}
	public function getPost($name)
	{
		return (isset($this->_postData[$name])?$this->_postData[$name]:false);
	}
	public function getSession($name)
	{
		return (isset($this->_sessionData[$name])?$this->_sessionData[$name]:false);
	}
	private function clearTab(array &$entry){
		foreach($entry as $key => $value){
			$entry[$key] = str_replace("'", "\\'", $value);
		}
	}
}



?>