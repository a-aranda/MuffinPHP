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
* Allow or disallow creation of new user accounts. 
*/ 
$muff->config['create_new_users'] = true;

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
'index'     => array('enabled' => true,'class' => 'CCIndex'), 
'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
'muff-config' => array('enabled' => true,'class' => 'CCMuffConfig'),
'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
'user'      => array('enabled' => true,'class' => 'CCUser'),
'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
'content'   => array('enabled' => true,'class' => 'CCContent'),
'page'      => array('enabled' => true,'class' => 'CCPage'),
'blog'      => array('enabled' => true,'class' => 'CCBlog'),
'theme'     => array('enabled' => true,'class' => 'CCTheme'),
'module'    => array('enabled' => true,'class' => 'CCModules'),
'my'        => array('enabled' => true,'class' => 'CCMycontroller'),
'files'        => array('enabled' => true,'class' => 'CCFilesHandler'),
);

/**
* Define menus.
*
* Create hardcoded menus and map them to a theme region through $muff->config['theme'].
*/
$muff->config['menus'] = array(
 'navbar' => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),
  ),
 'my-navbar' => array(
    'home'      => array('label'=>'About Me', 'url'=>'my'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
  ),
);

/**
* Define a routing table for urls.
*
* Route custom urls to a defined controller/method/arguments
*/
$muff->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
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

/**
* Settings for the theme.
*/
$muff->config['theme'] = array(
  'path'            => 'site/theme/mytheme',
  'parent'          => 'themes/muffin-core',
  'stylesheet'      => 'style.css',       // Main stylesheet to include in template files
  'template_file'   => 'index.tpl.php',   // Default template file, else use default.tpl.php
  // A list of valid theme regions
  'regions' => array('navbar','flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  // Add static entries for use in the template file. 
  'menu_to_region' => array('my-navbar'=>'navbar'),
  'data' => array(
    'header' => 'MuffinPHP',
    'slogan' => 'This is a prebaked framework that makes building web applications easier and faster.',
    'favicon' => 'favicon.ico',
    'logo' => 'img/muff.png',
    'btn_download' => 'img/btn-download.png',
    'btn_download_hover' => 'img/btn-download-hover.png',
    'hr' => 'img/hr-muff-divider.png',
    'cat' => 'img/muff-cat.png',
    'footer' => '<p class="text-center">Powered by <a href="http://www.student.bth.se/~alar12/phpmvc/kmom06-extra/muffinphp/" class="navbar-link">Muffin PHP </a>&copy; by <a href="http://www.student.bth.se/~alar12/phpmvc/kmom01/index.php" class="navbar-link">Alvaro Aranda Muñoz</a></p>',
  ),
);