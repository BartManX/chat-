<?php

/*
 * Script name: ChatPlus v1.2
 * Author: SoftProjects
 * Last Update: 4/06/2015
 * Date created: 3/13/2015
 */

 
function Emoticons($text) {

    $site_link = $GLOBALS['settings']['site_link'];

    $folder = $site_link . "uploads/emoticons";

    $text = str_replace("(angel)", "<img src='$folder/angel.png'>", $text);
    $text = str_replace("(sun)", "<img src='$folder/sun.gif'>", $text);
    $text = str_replace(":@", "<img src='$folder/angry.png'>", $text);
    $text = str_replace(";@", "<img src='$folder/angry.png'>", $text);
    $text = str_replace("(beer)", "<img src='$folder/beer.png'>", $text);
    $text = str_replace("(blush)", "<img src='$folder/blush.png'>", $text);
    $text = str_replace("(bomb)", "<img src='$folder/bomb.png'>", $text);
    $text = str_replace("(brb)", "<img src='$folder/brb.png'>", $text);
    $text = str_replace("(smoke)", "<img src=img'$folder/cigarette.png'>", $text);
    $text = str_replace("(coffe)", "<img src='$folder/coffee.png'>", $text);
    $text = str_replace("(confused)", "<img src='$folder/confused.png'>", $text);
    $text = str_replace("8-)", "<img src='$folder/cool.png'>", $text);
    $text = str_replace(";(", "<img src=img'$folder/cry.png'>", $text);
    $text = str_replace("(devil)", "<img src='$folder/devil.png'>", $text);
    $text = str_replace(":?", "<img src='$folder/dont_know.png'>", $text);
    $text = str_replace("(eat)", "<img src='$folder/eat.png'>", $text);
    $text = str_replace(":|", "<img src='$folder/erm.png'>", $text);
    $text = str_replace(";|", "<img src='$folder/erm.png'>", $text);
    $text = str_replace("(evil)", "<img src='$folder/evil.png'>", $text);
    $text = str_replace("(girl)", "<img src='$folder/girl.png'>", $text);
    $text = str_replace("(music)", "<img src='$folder/headphones.png'>", $text);
    $text = str_replace(":D", "<img src='$folder/joking.png'>", $text);
    $text = str_replace(";D", "<img src='$folder/joking.png'>", $text);
    $text = str_replace(";*", "<img src='$folder/kiss.png'>", $text);
    $text = str_replace(":*", "<img src='$folder/kiss.png'>", $text);
    $text = str_replace("(kissed)", "<img src='$folder/kissed.png'>", $text);
    $text = str_replace("lol", "<img src='$folder/lol.png'>", $text);
    $text = str_replace("(inlove)", "<img src='$folder/love.png'>", $text);
    $text = str_replace("<3", "<img src='$folder/love.png'>", $text);
    $text = str_replace("(rose)", "<img src='$folder/rose.png'>", $text);
    $text = str_replace(":(", "<img src='$folder/sad.png'>", $text);
    $text = str_replace(";(", "<img src='$folder/sad.png'>", $text);
    $text = str_replace("(scared)", "<img src='$folder/scared.png'>", $text);
    $text = str_replace("(sleep)", "<img src='$folder/sleep.png'>", $text);
    $text = str_replace("(stop)", "<img src='$folder/stop.png'>", $text);
    $text = str_replace(":O", "<img src='$folder/surprized.png.png'>", $text);
    $text = str_replace(";O", "<img src='$folder/surprized.png.png'>", $text);
    $text = str_replace("(y)", "<img src='$folder/thumb.png'>", $text);
    $text = str_replace("(n)", "<img src='$folder/thumb_down.png'>", $text);
    $text = str_replace(":P", "<img src='$folder/tongue.png'>", $text);
    $text = str_replace(":p", "<img src='$folder/tongue.png'>", $text);
    $text = str_replace(";p", "<img src='$folder/tongue.png'>", $text);
    $text = str_replace(";)", "<img src='$folder/wink.png'>", $text);
    $text = str_replace(":)", "<img src='$folder/smile.png'>", $text);
    $text = str_replace("(dance)", "<img src='$folder/dance.gif'>", $text);
    $text = str_replace("(hi)", "<img src='$folder/hi.gif'>", $text);

    $text = str_replace("путка", "п*тка", $text);

    return $text;
}

function showEmoticons() {

    $site_link = $GLOBALS['settings']['site_link'];
    $dir = "uploads/emoticons/";

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".", "..","index.php"))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                echo "<img src='$site_link$dir$value' />";
            }
        }
    }
}
