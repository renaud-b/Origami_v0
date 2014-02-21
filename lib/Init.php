<?php
/**
 * Framework Origami
 * Chargement de toutes les classes + autoload + session_start
 * @author Renaud Bataille
 */
defined('SEC_TOK') or die('Access Denied');

define('DS', DIRECTORY_SEPARATOR);
define('ACP_PATH', APP_PATH . DS . 'ACP');
define('API_PATH', APP_PATH . DS . 'API');

define('ORIGAMI_SELF_PAGE', '#');
require_once LIB_PATH . DS . 'Observer' . DS . 'Observer.php';
require_once LIB_PATH . DS . 'Observer' . DS . 'Subject.php';
require_once LIB_PATH . DS . 'Http' . DS . 'HttpData.php';
require_once LIB_PATH . DS . 'Controller' . DS . 'MainController.php';
require_once LIB_PATH . DS . 'View' . DS . 'View.php';
// Auto loader
require_once LIB_PATH . DS . 'Loader' . DS . 'Autoload.php';

require_once LIB_PATH . DS . 'Controller' . DS . 'AbstractACP.php';

require_once LIB_PATH . DS . 'API' . DS . 'APILoader.php';
require_once LIB_PATH . DS . 'Factory' . DS . 'DBFactory.php';

require_once LIB_PATH . DS . 'Db' . DS . 'QueryViewer.php';

session_start();

spl_autoload_register('Loader::autoloader');



