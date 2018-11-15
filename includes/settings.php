
<?php
/*
 *
 * Script name: ChatPlus v1.0
 * Author: SoftProjects
 * Date created: 3/13/2015
 *
 */

$settings = array(
    "name" => "ChatPlus", // Enter your name system.
    "version" =>"1.1", // Do not change.
    "site_name" => "ChatPlus", // Enter your name on the site.
    "site_link" => "http://chatplus.softprojects.info/", // Enter URL to the site.
    "site_template" => "template/default/", // Enter template folder
    "site_description" => "Online Ajax Chat",
    "site_metatags" => "Andreyst, my, cool, facebook, chat, ajax",
    "Attempts" => 5, //The number of login attempts before lockdown
    "Allow Special Characters" => false, // Allow / Deny special characters in the password when changed or a user is created
    "Allow Numbers" => false, //Allow / Deny numbers in the password when changed or a user is created
    "Email Extention" => "noreplay@softprojects.info", // Email extention for the default no reply email address and other mails sent
    "Redirect Page" => "/user/login", // The name of the login page | Located in the same folder as the protected page | If not provided link to the login page
    "Backups Limit" => 30, // The limit of the backups created | When reached the will automatically clean up leaving the most recent one
    "Backups Folder" => "backups", // Name of the folder where the backups will be saved
);

?>