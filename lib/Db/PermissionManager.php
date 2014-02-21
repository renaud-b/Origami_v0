<?php

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

class PermissionManager{
    static public function getByName($filename){
       
        $iniFileContent = parse_ini_file(APP_PATH . DIRECTORY_SEPARATOR . 'config.ini');
        foreach($iniFileContent as $key => $value){
            if(in_array($filename, $value)){
                return $key;
            }
        }
        return "no_access";
    }
    
    
}
?>
