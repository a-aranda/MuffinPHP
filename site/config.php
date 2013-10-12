<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/*
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);

/*
* Enable short-open-tag in php for templating.
*/
if (ini_get('short_open_tag')){
	ini_set('short_open_tag',1);
}

/*
* Define session name
*/
$muff->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]); //eliminate strange characters from the server_name
$muff->config['session_key'] = 'muffin';

/*
* Define server timezone
*/
$muff->config['timezone'] = 'Europe/Stockholm';

/*
* Define internal character encoding
*/
$muff->config['character_encoding'] = 'UTF-8';

/*
* Define language
*/
$muff->config['language'] = 'en';

/*
* Turn On/Off the debugg
 */

$muff->config['enabled'] = 'on';

/**
* Set database(s).
*/
$muff->config['database'][0]['dsn'] = 'sqlite:' . MUFFINPHP_SITE_PATH . '/data/.ht.sqlite';

/**
* Set what to show as debug or developer information in the get_debug() theme helper.
*/
$muff->config['debug']['muffin'] = false;
$muff->config['debug']['db-num-queries'] = true;
$muff->config['debug']['db-queries'] = true;

/** 
* How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1. 
*/ 
$muff->config['hashing_algorithm'] = 'sha1salt';

/** 
* Define the controllers, their classname and enable/disable them. 
* 
* The array-key is matched against the url, for example: 
* the url 'developer/dump' would instantiate the controller with the key "developer", that is 
* CCDeveloper and call the method "dump" in that class. This process is managed in: 
* $muff->FrontControllerRoute(); 
* which is called in the frontcontroller phase from index.php. 
*/ 
$muff->config['controllers'] = array( 
'index' => array('enabled' => true,'class' => 'CCIndex'), 
'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
'user'      => array('enabled' => true,'class' => 'CCUser'),
'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
);

/**
* Settings for the theme.
*/
$muff->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'	=> 'core',
);

/** 
* Set a base_url to use another than the default calculated 
*/ 
$muff->config['base_url'] = null;

/**
* What type of urls should be used?
*
* default      = 0      => index.php/controller/method/arg1/arg2/arg3
* clean        = 1      => controller/method/arg1/arg2/arg3
* querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
*/
$muff->config['url_type'] = 1;