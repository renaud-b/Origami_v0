<?php
/**
 * 	Framework Origami
 * 	interface IController
 *  servant de mod�le a tous les Sub-Controller
 * @author Renaud Bataille
 *
 */
defined('SEC_TOK') or die('Access Denied');

interface IController
{

	public function __construct($subjectData, View $view);
	public function Load();
}

?>