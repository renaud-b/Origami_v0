<?php
/**
 * Framework Origami
 * Point d'entré de l'application
 * @author Renaud Bataille
 */


//definition du jeton de sécurité
//Empechant le chargement des autres fichiers sans passer par cette page.
define('SEC_TOK', md5(rand(0, 1000)));

// Definition et inclusion des elements de base
define('LIB_PATH', './lib');
define('APP_PATH', './app');
define('WEB_PATH', './web');

require_once(LIB_PATH . DIRECTORY_SEPARATOR . 'Init.php');

$rootObserver = new Observer(); // Création de l'Observer
$globalView = new View(); // Creation de la vue
$globalView->attach($rootObserver); // on attache l'observer a la vue
$globalView->send(); //affichage de la vue

// Affiche les logs d'erreurs du manager de requete
QueryViewer::getInstance()->Logg();
