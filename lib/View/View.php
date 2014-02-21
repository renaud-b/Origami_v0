<?php
/**
 * Framework Origami
 * View
 * Classe de view, s'occupe de tout l'affichage et de la reception des données.
 * @author Renaud Bataille
 */

defined('SEC_TOK') or die('Access Denied');

class View extends Subject
{
	private $_internalData = null;
	private $_httpData = null;
	private $_layout = null;
	private $_content = null;

	private $_sharedVars = null;
	private $_path = null;

	/**
	 * Retourn le contenue de la view.
	 */
	private function getContent()
	{
		return $this->_content;
	}

	/**
	 * Constructeur
	 */
	public function __construct()
	{
		parent::__construct();
		$this->_httpData = new HttpData();
		$this->_internalData['HttpData'] = $this->_httpData;

		$this->_sharedVars = array();

		$this->_path = array('layout' => '',
				'content' => '');

	}
	public function getInternalData()
	{
		return $this->_internalData;
	}
	public function addInternalData($key, $value)
	{
		$this->_internalData[$key] = $value;
	}
	public function getInternalValue($key)
	{
		return (isset($this->_internalData[$key])?$this->_internalData:false);
	}
	/**
	 * Ajoute le contenue a la vue
	 * @param $name (chemin vers le contenue)
	 */
	public function setContent($name)
	{
		$path = WEB_PATH . DS . 'views' . DS . $name . '.php';

		if(file_exists($path))
		{
			$this->_path['content'] = $path;
		}
	}
	/**
	 * Ajoute le layout a la vue
	 * @param $name (chemin vers le layout)
	 */
	public function setLayout($name)
	{
		$path = WEB_PATH . DS . 'layout' . DS . $name . '.php';

		if(file_exists($path))
		{
			$this->_path['layout'] = $path;
		}
	}
	/**
	 * Send()
	 * assemble le layout + le contenue et envois le tout au visiteur
	 */
	public function send()
	{
		// Get content
		if(!empty($this->_path['content']))
		{
			ob_start();

			require_once $this->_path['content'];
			$this->_content = ob_get_contents();
				
			ob_end_clean();
		}

		// Get layout
		if(!empty($this->_path['layout']))
		{
			ob_start();
				
			require_once $this->_path['layout'];
			$this->_layout = ob_get_contents();
				
			ob_end_clean();
		}

		// Render all view
		echo $this->_layout;
	}
	/**
	 * assign()
	 * Ajoute une variable a la vue
	 * @param string $key
	 * @param mixed $value
	 */
	public function assign($key, $value)
	{
		$this->_sharedVars[$key] = $value;
	}

	/**
	 * renvois toutes les variables assigné a la vue
	 */
	private function _getVars()
	{
		return $this->_sharedVars;
	}
	/**
	 * renvois la variable $key ou false si elle n'a pas été trouvée
	 * @param string $key
	 */
	private function _getvar($key)
	{
		return (isset($this->_sharedVars[$key])?$this->_sharedVars[$key]: false);
	}



}

?>