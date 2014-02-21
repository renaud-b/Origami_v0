<?php
/**
 * Framework Origami
 * Fichier d'exemple pour une classe API
 * @author Renaud Bataille
 */

class Sample
{
	/*
		Cette classe est appeller lors de chargement de l'API, elle permet de recupéré l'objet désiré grace a une methode
	*/
	public static function GetInstance()
	{
		require_once './class/Hostel/hostel.php';
		return new hostel();
	}
}

?>