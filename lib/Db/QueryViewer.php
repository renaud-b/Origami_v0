<?php
defined('SEC_TOK') or die('Access Denied');
/* Copyright 2013-2014 Bataille Renaud
 *
 * This file is part of Origami.
 *
 * Origami is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License 
 * as published by the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * Origami is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even 
 * the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with Foobar. 
 * If not, see http://www.gnu.org/licenses/.
 * 
 */

class QueryViewer{
    static private $Instance = null;
    private $elementList;
    
    private function __construct(){
        $this->elementList = array();
    }
    static public function getInstance(){
        if(!self::$Instance){
            self::$Instance = new QueryViewer();
        }
        return self::$Instance;
    }
    public function AddElement($string){
            $this->elementList[] = $string;
    }
    public function Logg(){
        foreach($this->elementList as $key => $value){
            echo $value . '<br />';
        }
    }
}

?>
