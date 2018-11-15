<?php

/*
 * Script name: ChatPlus v1.2
 * Author: SoftProjects
 * Last Update: 4/06/2015
 * Date created: 3/13/2015
 */

function convertutf8() {
// convert code
    $res = mysql_query("SHOW TABLES");
    while ($row = mysql_fetch_array($res)) {
        foreach ($row as $key => $table) {
            mysql_query("ALTER TABLE " . $table . " CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci");
            echo $key . " =&gt; " . $table . " CONVERTED<br />";
        }
    }
}
function short_text($text, $length) {
    $maxTextLenght = $length;
    $aspace = " ";
    if (strlen($text) > $maxTextLenght) {
        $text = substr(trim($text), 0, $maxTextLenght);
        $text = substr($text, 0, strlen($text) - strpos(strrev($text), $aspace));
        $text = $text . '...';
    }
    return $text;
}

function timeToDate($time, $format = "F j, Y, g:i a") {
	$today = date($format, $time);
	return $today;
}

//Prepare Flash Message in a certain Format.
function alertMessage($msg, $type) {
    $returnmsg = '';
    switch ($type) {
        case 0: $returnmsg = ""
                    . "<div class='alert alert-success'>"
                    . "<i class='fa fa-check'></i>"
                    . "<button class='close' data-close='alert'></button> "
                    . " " . $msg . ""
                    . "</div>";
            break;
        case 1: $returnmsg = ""
                    . "<div class='alert alert-danger'>"
                    . "<i class='fa fa-times'></i>"
                    . "<button class='close' data-close='alert'></button> "
                    . " " . $msg . ""
                    . "</div>";
            break;
        case 2: $returnmsg = ""
                    . "<div class='alert alert-info'>"
                    . "<i class='fa fa-lightbulb-o'></i>"
                    . "<button class='close' data-close='alert'></button>"
                    . " " . $msg . ""
                    . "</div>";
            break;
        case 3: $returnmsg = ""
                    . "<div class='alert alert-warning'>"
                    . "<i class='fa fa-exclamation-triangle'></i>"
                    . "<button class='close' data-close='alert'></button> "
                    . " " . $msg . ""
                    . "</div>";
            break;
    }

    return $returnmsg;
}

function remove_p($string) {
    $string = str_replace("<p>", "", $string);
    $string = str_replace("</p>", "", $string);
    return $string;
}

function check_img($url) {

  $pos = strrpos( $url, ".");
	if ($pos === false)
	  return false;
	$ext = strtolower(trim(substr( $url, $pos)));
	$imgExts = array(".gif", ".jpg", ".jpeg", ".png", ".tiff", ".tif"); // this is far from complete but that's always going to be the case...
	if ( in_array($ext, $imgExts) )
	  return true;
    return false;
  }

if (!function_exists('mime_content_type')) {

    function mime_content_type($filename) {

        $mime_types = array(
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',
            // archives
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
            // audio/video
            'mp3' => 'audio/mpeg',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',
            // ms office
            'doc' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.', $filename)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        } elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $filename);
            finfo_close($finfo);
            return $mimetype;
        } else {
            return 'application/octet-stream';
        }
    }

}


$countryArray = array(
    'AE' => 'United Arab Emirates', 'AF' => 'Afghanistan', 'AG' => 'Antigua and Barbuda',
    'AL' => 'Albania', 'AM' => 'Armenia', 'AO' => 'Angola', 'AR' => 'Argentia',
    'AT' => 'Austria', 'AU' => 'Australia', 'AZ' => 'Azerbaijan', 'BA' => 'Bosnia and Herzegovina',
    'BB' => 'Barbados', 'BD' => 'Bangladesh', 'BE' => 'Belgium', 'BF' => 'Burkina Faso',
    'BG' => 'Bulgaria', 'BI' => 'Burundi', 'BJ' => 'Benin', 'BN' => 'Brunei Darussalam',
    'BO' => 'Bolivia', 'BR' => 'Brazil', 'BS' => 'Bahamas', 'BT' => 'Bhutan',
    'BW' => 'Botswana', 'BY' => 'Belarus', 'BZ' => 'Belize', 'CA' => 'Canada',
    'CD' => 'Congo', 'CF' => 'Central African Republic', 'CG' => 'Congo', 'CH' => 'Switzerland',
    'CI' => "Cote d'Ivoire", 'CL' => 'Chile', 'CM' => 'Cameroon', 'CN' => 'China', 'CO' => 'Colombia',
    'CR' => 'Costa Rica', 'CU' => 'Cuba', 'CV' => 'Cape Verde', 'CY' => 'Cyprus',
    'CZ' => 'Czech Republic', 'DE' => 'Germany', 'DJ' => 'Djibouti', 'DK' => 'Denmark',
    'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'DZ' => 'Algeria', 'EC' => 'Ecuador',
    'EE' => 'Estonia', 'EG' => 'Egypt', 'ER' => 'Eritrea', 'ES' => 'Spain', 'ET' => 'Ethiopia',
    'FI' => 'Finland', 'FJ' => 'Fiji', 'FK' => 'Falkland Islands', 'FR' => 'France', 'GA' => 'Gabon',
    'GB' => 'United Kingdom', 'GD' => 'Grenada', 'GE' => 'Georgia', 'GF' => 'French Guiana',
    'GH' => 'Ghana', 'GL' => 'Greenland', 'GM' => 'Gambia', 'GN' => 'Guinea', 'GQ' => 'Equatorial Guinea',
    'GR' => 'Greece', 'GT' => 'Guatemala', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HN' => 'Honduras',
    'HR' => 'Croatia', 'HT' => 'Haiti', 'HU' => 'Hungary', 'ID' => 'Indonesia', 'IE' => 'Ireland',
    'IL' => 'Israel', 'IN' => 'India', 'IQ' => 'Iraq', 'IR' => 'Iran', 'IS' => 'Iceland',
    'IT' => 'Italy', 'JM' => 'Jamaica', 'JO' => 'Jordan', 'JP' => 'Japan', 'KE' => 'Kenya',
    'KG' => 'Kyrgyz Republic', 'KH' => 'Cambodia', 'KM' => 'Comoros', 'KN' => 'Saint Kitts and Nevis',
    'KP' => 'North Korea', 'KR' => 'South Korea', 'KW' => 'Kuwait', 'KZ' => 'Kazakhstan',
    'LA' => "Lao People's Democratic Republic", 'LB' => 'Lebanon', 'LC' => 'Saint Lucia',
    'LK' => 'Sri Lanka', 'LR' => 'Liberia', 'LS' => 'Lesotho', 'LT' => 'Lithuania', 'LV' => 'Latvia',
    'LY' => 'Libya', 'MA' => 'Morocco', 'MD' => 'Moldova', 'MG' => 'Madagascar', 'MK' => 'Macedonia',
    'ML' => 'Mali', 'MM' => 'Myanmar', 'MN' => 'Mongolia', 'MR' => 'Mauritania', 'MT' => 'Malta',
    'MU' => 'Mauritius', 'MV' => 'Maldives', 'MW' => 'Malawi', 'MX' => 'Mexico', 'MY' => 'Malaysia',
    'MZ' => 'Mozambique', 'NA' => 'Namibia', 'NC' => 'New Caledonia', 'NE' => 'Niger',
    'NG' => 'Nigeria', 'NI' => 'Nicaragua', 'NL' => 'Netherlands', 'NO' => 'Norway', 'NP' => 'Nepal',
    'NZ' => 'New Zealand', 'OM' => 'Oman', 'PA' => 'Panama', 'PE' => 'Peru', 'PF' => 'French Polynesia',
    'PG' => 'Papua New Guinea', 'PH' => 'Philippines', 'PK' => 'Pakistan', 'PL' => 'Poland',
    'PT' => 'Portugal', 'PY' => 'Paraguay', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania',
    'RS' => 'Serbia', 'RU' => 'Russian FederationÃŸ', 'RW' => 'Rwanda', 'SA' => 'Saudi Arabia',
    'SB' => 'Solomon Islands', 'SC' => 'Seychelles', 'SD' => 'Sudan', 'SE' => 'Sweden',
    'SI' => 'Slovenia', 'SK' => 'Slovakia', 'SL' => 'Sierra Leone', 'SN' => 'Senegal',
    'SO' => 'Somalia', 'SR' => 'Suriname', 'ST' => 'Sao Tome and Principe', 'SV' => 'El Salvador',
    'SY' => 'Syrian Arab Republic', 'SZ' => 'Swaziland', 'TD' => 'Chad', 'TG' => 'Togo',
    'TH' => 'Thailand', 'TJ' => 'Tajikistan', 'TL' => 'Timor-Leste', 'TM' => 'Turkmenistan',
    'TN' => 'Tunisia', 'TR' => 'Turkey', 'TT' => 'Trinidad and Tobago', 'TW' => 'Taiwan',
    'TZ' => 'Tanzania', 'UA' => 'Ukraine', 'UG' => 'Uganda', 'US' => 'United States of America',
    'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VE' => 'Venezuela', 'VN' => 'Vietnam', 'VU' => 'Vanuatu',
    'YE' => 'Yemen', 'ZA' => 'South Africa', 'ZM' => 'Zambia','ZW' => 'Zimbabwe'
);
$fontFamilyArr  =   array(
    "Arial", "Book Antiqua", "Century Gothic", "Comic Sans MS", "Courier New", "Fixedsys",
    "Franklin Gothic Medium", "Garamond", "Georgia", "Impact", "Lobster", "Lucida Console",
    "Microsoft Sands Serif", "Noto Sans", "Palatino Linotype", "System","Tahoma", "Times New Roman",
    "Trebuchet MS","Verdana"
);

function secure( $data, $isPass = false ){
    $data = htmlspecialchars( trim( $data ), ENT_QUOTES );
    $data = $isPass ? hash( 'sha512', $data . 'TAHCLWO' ) : $data;
    return $data;
}

function get_extension($file_name){
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}

function isReady( $dataArray, $checkArray ){
    foreach( $checkArray as $key ) {
        if(isset($dataArray[$key]) && !empty($dataArray[$key])) {
            continue;
        }
        else {
            return false;
        }
    }
    return true;
}

function get_random_string( $length,  $onlyLetters    =    false ){
    if( $onlyLetters ){
        $valid_chars   =   "abcdefghijklmnopqrstuvwxyz";
    }else{
        $valid_chars   =   "ABCDEFGHIJLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
    }

    // start with an empty random string
    $random_string = "";

    // count the number of chars in the valid chars string so we know how many choices we have
    $num_valid_chars = strlen($valid_chars);

    // repeat the steps until we've created a string of the right length
    for ($i = 0; $i < $length; $i++)
    {
        // pick a random number from 1 up to the number of valid chars
        $random_pick = mt_rand(1, $num_valid_chars);

        // take the random character out of the string of valid chars
        // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
        $random_char = $valid_chars[$random_pick-1];

        // add the randomly-chosen char onto the end of our string so far
        $random_string .= $random_char;
    }

    // return our finished random string
    return $random_string;
}

function checkHex($hex){
    return preg_match( '/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $hex );
}

function dj($arr = array()){
    die(json_encode($arr));
}

function getParams(){
    return json_decode(file_get_contents('php://input'), true);
}
function curl_get($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
}