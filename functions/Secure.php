<?php

/*
 * Script name: ChatPlus v1.2
 * Author: SoftProjects
 * Last Update: 4/06/2015
 * Date created: 3/13/2015
 */

function Protect($string) {

    $protection = htmlspecialchars(trim($string), ENT_QUOTES);
	
    $protection = mysql_escape_string($protection);
	
    return $protection;
}