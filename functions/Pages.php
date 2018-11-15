<?php

/*
 * Script name: ChatPlus v1.2
 * Author: SoftProjects
 * Last Update: 4/06/2015
 * Date created: 3/13/2015
 */


function Pages($section, $page) {
//secure parameters
    $section = secureParam($section);
    $page = secureParam($page);

    if (is_file("pages/" . $section . "/" . $page . ".php")) {
        include("pages/" . $section . "/" . $page . ".php");
    } else {
        header("Location: /error/404");
    }
}

function secureParam($str) {
        if ($str !== mb_convert_encoding(mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
        $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
        $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\\1', $str);
        $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
        $str = preg_replace(array('`[^a-zA-Z0-9_.-]`i', '`[-]+`'), '-', $str);
        $str = strtolower(trim($str, '-'));
        return $str;
    }
    