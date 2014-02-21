<?php
/**
 * 	Framework Origami
 * 	class finale Origami_MainController
 *  cette classe appelle le sub-controller correspondant à la demande du visiteur.
 * @author Renaud Bataille
 *
 */
defined('SEC_TOK') or die('Access Denied');

require_once dirname(__FILE__) . DS . 'IController.php';

final class Origami_MainController implements IController
{
	protected $_view = null; //Instance de la vue
	protected $_subjectData = null; //Parametres de la vue
	protected $_globalContent = null; //Inutile pour le moment
	private $_layout = null; // Layout de la page en cour
	private $_content = null; // contenue de la page en cour

	/**
	 * constructor
	 * @param mixed $subjectData
	 * @param View $view
	 */
	public function __construct($subjectData, View $view){
		$this->_view = $view;
		$this->_subjectData = $subjectData;
	}

	/**
	 * Methode Load()
	 * charge le sub controller correspondant.
	 */
	public function Load()
	{
		// On recupere l'URI demandé dont on extrais le nom du subcontroller et de l'action souhaité
		$Uri = $this->_subjectData['HttpData']->getGet('c');
		$UriData = explode('/', $Uri);

		if(isset($UriData[0]) && isset($UriData[1]))
		{
			$className = $UriData[0] . 'Controller';
			$action = $UriData[1] . 'Action';
				
			$subController = new $className($this->_subjectData, $this->_view);
				
			if(method_exists($subController, 'init'))
			{
				$subController->init();
			}
				
			if(method_exists($subController , $action))
			{
				$subController->$action();
			}
			else if(method_exists($subController, 'defaultAction'))
			{
				$subController->defaultAction();
			}
		}
		else
		{
			// On arrive dans cette section quand aucun subcontroller n'a été fournis dans l'url (sur la page d'accueil par exemple)
			// cette partie du script charge donc le fichier de configuration des routes pour charger les routes par defaut.
			require_once APP_PATH . DS . 'route.php';
				
			$className = $_defaultRoute['default_controller'] . 'Controller';
			$action = $_defaultRoute['default_action'] . 'Action';
				
			$subController = new $className($this->_subjectData, $this->_view);
				
			if(method_exists($subController, 'init'))
			{
				$subController->init();
			}
			if(method_exists($subController , $action))
			{
				$subController->$action();
			}
		}

	}
}

?>
